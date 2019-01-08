<?php
namespace Users\Service;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Zend\Crypt\Password\Bcrypt;
use Users\Entity\User;

/**
 * Adapter used for authenticating user.
 * It takes login and password on input
 * and checks the database if there is a user with such login (email) and password.
 * If such user exists, the service returns its identity (email). The identity
 * is saved to session and can be retrieved later with Identity view helper provided
 * by ZF3.
 */
class AuthAdapter implements AdapterInterface
{

    /**
     * user Identity Field.
     *
     * @var string
     */
    private $identity_field;

    /**
     * user username.
     *
     * @var string
     */
    private $username;

    /**
     * User email.
     *
     * @var string
     */
    private $email;

    /**
     * Password
     *
     * @var string
     */
    private $password;

    /**
     * Entity manager.
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * Constructor.
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * sets user identity field
     *
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Sets user email.
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Sets password.
     */
    public function setPassword($password)
    {
        $this->password = (string) $password;
    }

    /**
     * Performs an authentication attempt.
     */
    public function authenticate()
    {
        if ($this->email) {
            // Check the database if there is a user with such email.
            $user = $this->entityManager->getRepository(User::class)->findOneByEmail($this->email);
        }
        if ($this->username) {
            // Check the database if there is a user with such username.
            $user = $this->entityManager->getRepository(User::class)->findOneByUsername($this->username);
        }
        if (! $this->email && ! $this->username) {
            $user = null;
        }
        // If there is no such user, return 'Identity Not Found' status.
        if ($user == null) {
            return new Result(Result::FAILURE_IDENTITY_NOT_FOUND, null, [
                'Invalid credentials.'
            ]);
        }
        // If the user with such email exists, we need to check if it is active or retired.
        // Do not allow retired users to log in.
        if ($user->getState() == User::STATE_RETIRED) {
            return new Result(Result::FAILURE, null, [
                'User is retired.'
            ]);
        }

        // Now we need to calculate hash based on user-entered password and compare
        // it with the password hash stored in database.
        $bcrypt = new Bcrypt();
        $passwordHash = $user->getPassword();

        if ($bcrypt->verify($this->password, $passwordHash)) {
            // Great! The password hash matches. Return user identity (email) to be
            // saved in session for later use.
            if ($this->email) {
                return new Result(Result::SUCCESS, $this->reflectUser($user), [
                    'Authenticated successfully.'
                ]);
            }
            if ($this->username) {
                return new Result(Result::SUCCESS, $this->reflectUser($user), [
                    'Authenticated successfully.'
                ]);
            }
        }

        // If password check didn't pass return 'Invalid Credential' failure status.
        return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, [
            'Invalid credentials.'
        ]);
    }

    public function reflectUser($user)
    {
        $authenticated_user = new User();
        $n_user = new \ReflectionObject($user);
        $properties = $n_user->getProperties();
        foreach ($properties as $property) {
            $name = $property->name;
            $p = $n_user->getProperty($name);
            $p->setAccessible(true);
            $value = $p->getValue($user);
            $method = 'set' . ucfirst($name);
            if ($name != 'password') {
                $authenticated_user->$method($value);
            }
        }
        return $authenticated_user;
    }
}


