<?php
namespace Users\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a registered user.
 *
 * @ORM\Entity(repositoryClass="\Users\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User
{

    // User status constants.
    // Active user.
    const STATE_ACTIVE = 1;

    // Retired user.
    const STATE_RETIRED = 666;

    /**
     *
     * @ORM\Id
     * @ORM\Column(name="user_id")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     *
     * @ORM\Column(name="first_name")
     */
    protected $firstName;

    /**
     *
     * @ORM\Column(name="second_name")
     */
    protected $secondName;

    /**
     *
     * @ORM\Column(name="username")
     */
    protected $username;

    /**
     *
     * @ORM\Column(name="email")
     */
    protected $email;

    /**
     *
     * @ORM\Column(name="cell_phone")
     */
    protected $cellPhone;

    /**
     *
     * @ORM\Column(name="display_name")
     */
    protected $displayName;

    /**
     *
     * @ORM\Column(name="role")
     */
    protected $role;

    /**
     *
     * @ORM\Column(name="password")
     */
    protected $password;

    /**
     *
     * @ORM\Column(name="state")
     */
    protected $state;

    /**
     *
     * @ORM\Column(name="date_registered")
     */
    protected $dateRegistered;

    /**
     *
     * @ORM\Column(name="pwd_reset_token")
     */
    protected $passwordResetToken;

    /**
     *
     * @ORM\Column(name="pwd_reset_token_creation_date")
     */
    protected $passwordResetTokenCreationDate;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getSecondName()
    {
        return $this->secondName;
    }

    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function getCellPhone()
    {
        return $this->cellPhone;
    }

    public function setCellPhone($cellPhone)
    {
        $this->cellPhone = $cellPhone;
        return $this;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    /**
     * Returns possible state as array.
     *
     * @return array
     */
    public static function getStateList()
    {
        return [
            self::STATE_ACTIVE => 'Active',
            self::STATE_RETIRED => 'Retired'
        ];
    }

    /**
     * Returns user state as string.
     *
     * @return string
     */
    public function getStateAsString()
    {
        $list = self::getStateList();
        if (isset($list[$this->state]))
            return $list[$this->state];

        return 'Unknown';
    }

    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    public function getDateRegistered()
    {
        return $this->dateRegistered;
    }

    public function setDateRegistered($dateRegistered)
    {
        $this->dateRegistered = $dateRegistered;
        return $this;
    }

    /**
     * Returns password reset token.
     *
     * @return string
     */
    public function getPasswordResetToken()
    {
        return $this->passwordResetToken;
    }

    /**
     * Sets password reset token.
     *
     * @param string $token
     */
    public function setPasswordResetToken($token)
    {
        $this->passwordResetToken = $token;
    }

    /**
     * Returns password reset token's creation date.
     *
     * @return string
     */
    public function getPasswordResetTokenCreationDate()
    {
        return $this->passwordResetTokenCreationDate;
    }

    /**
     * Sets password reset token's creation date.
     *
     * @param string $date
     */
    public function setPasswordResetTokenCreationDate($date)
    {
        $this->passwordResetTokenCreationDate = $date;
    }
}