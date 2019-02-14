<?php
/**
 * StoneHMIS (http://stonehmis.afyaresearch.org/)
 *
 * @link      http://github.com/stonehmis/stone for the canonical source repository
 * @copyright Copyright (c) 2009-2018 Afya Research Africa Inc. (http://www.afyaresearch.org)
 * @license   http://stonehmis.afyaresearch.org/license/options License Options
 * @author    Moses Ndiritu
 * @since     02-11-2018
 */
namespace Users\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\ServiceManager\ServiceManager;
use Users\Form\UserForm;
use Users\Form\LoginForm;
use Users\Form\PasswordChangeForm;
use Users\Form\PasswordResetForm;

class FormUsersForm extends AbstractPlugin
{

    protected $serviceManager;

    public function getServiceManager()
    {
        return $this->serviceManager;
    }

    public function setServiceManager(ServiceManager $serviceManager)
    {
        return $this->serviceManager = $serviceManager;
        return $this;
    }

    public function getFormElementManager()
    {
        return $this->getServiceManager()->get('FormElementManager');
    }

    public function getFormElementsNames($form)
    {
        $formElements = $form->getElements();
        $elementNames = array();
        foreach ($formElements as $element) {
            $elementNames[] = $element->getName();
        }
        return $elementNames;
    }

    public function getUserRegisterForm()
    {
        $form = $this->getFormElementManager()->get(UserForm::class);
        return $form;
    }

    public function getUserEditForm()
    {
        $form = $this->getFormElementManager()->get(UserForm::class);
        $validationGroup = array(
            'user_id',
            'display_name',
            'first_name',
            'second_name',
            'role',
            'state',
            'cell_phone'
        );
        $form->setValidationGroup($validationGroup);
        $fields = array(
            'username',
            'email',
            'password',
            'password_verify'
        );
        foreach ($fields as $field) {
            $form->remove($field);
        }
        return $form;
    }

    public function getLoginForm()
    {
        $form = $this->getFormElementManager()->get(LoginForm::class);
        $elements = [
            '',
            'identity_field',
            'password',
            'redirect_url',
            'submit'
        ];
        $form->setValidationGroup(array_filter($elements));
        $formElements = $this->getFormElementsNames($form);
        if ($elements) {
            foreach ($formElements as $element) {
                if (! array_search($element, $elements)) {
                    $form->remove($element);
                } else {
                    $elementType = $form->get($element)->getAttribute('type');
                    $elementName = $element;
                    $this->setDojoAttribute($form, $elementName, $elementType);
                    if ($elementType == 'button' || $elementType == 'submit') {
                        $form->get($element)->setAttribute('class', 'myButton dojoFieldLong');
                    } else {
                        $form->get($element)->setAttribute('class', 'dojoFieldLong');
                    }
                }
            }
        } else {
            foreach ($formElements as $elem) {
                $elementType = $form->get($elem)->getAttribute('type');
                $elementName = $elem;
                $this->setDojoAttribute($form, $elementName, $elementType);
                if ($elementType == 'button' || $elementType == 'submit') {
                    $form->get($element)->setAttribute('class', 'myButton dojoFieldLong');
                } else {
                    $form->get($element)->setAttribute('class', 'dojoFieldLong');
                }
            }
        }
        $form->setAttributes(array(
            'class' => 'login_form'
        ));
        return $form;
    }

    function setDojoAttribute($form, $elementName, $elementType)
    {
        switch ($elementType) {
            case "text":
                $form->get($elementName)->setAttribute('data-dojo-type', 'dijit/form/TextBox');
                break;
            case "password":
                $form->get($elementName)->setAttribute('data-dojo-type', 'dijit/form/TextBox');
                break;
            case "button":
                $form->get($elementName)->setAttributes([
                    'id' => 'submitbutton',
                    'class' => 'myButton',
                    'data-dojo-type' => "dijit/form/Button",
                    'data-dojo-props' => "type:'submit'"
                ]);
                break;
            case "submit":
                $form->get($elementName)->setAttributes([
                    'id' => 'submitbutton',
                    'class' => 'myButton',
                    'data-dojo-type' => "dijit/form/Button",
                    'data-dojo-props' => "type:'submit'"
                ]);
                break;
            case "hidden":
                $form->get($elementName)->setAttribute('class', 'dojoFieldLong');
                break;
        }
    }

    /**
     * Get and configure PasswordChangeForm
     *
     * @return object
     */
    function getPasswordChangeForm()
    {
        $form = $this->getFormElementManager()->get(PasswordChangeForm::class);
        $formElements = $this->getFormElementsNames($form);
        foreach ($formElements as $element) {
            $elementType = $form->get($element)->getAttribute('type');
            $elementName = $element;
            $this->setDojoAttribute($form, $elementName, $elementType);
            if ($elementType == 'button' || $elementType == 'submit') {
                $form->get($element)->setAttribute('class', 'myButton dojoFieldLong');
            } else {
                $form->get($element)->setAttribute('class', 'dojoFieldLong');
            }
        }
        $form->setAttributes(array(
            'class' => 'login_form'
        ));
        return $form;
    }

    /**
     * Get and configure PasswordChangeForm
     *
     * @return object
     */
    function getPasswordSetForm()
    {
        $form = $this->getFormElementManager()->get(PasswordChangeForm::class);
        $form->remove('old_password');
        $validationGroup = $formElements = $this->getFormElementsNames($form);
        if (($key = array_search('submit', $validationGroup)) !== false) {
            unset($validationGroup[$key]);
        }
        $form->setValidationGroup($validationGroup);
        foreach ($formElements as $element) {
            $elementType = $form->get($element)->getAttribute('type');
            $elementName = $element;
            $this->setDojoAttribute($form, $elementName, $elementType);
            if ($elementType == 'button' || $elementType == 'submit') {
                $form->get($element)->setAttribute('class', 'myButton dojoFieldLong');
            } else {
                $form->get($element)->setAttribute('class', 'dojoFieldLong');
            }
        }
        $form->setAttributes(array(
            'class' => 'login_form'
        ));
        return $form;
    }

    /**
     * Get and configure PasswordResetForm
     *
     * @return object
     */
    function getPasswordResetForm()
    {
        $form = $this->getFormElementManager()->get(PasswordResetForm::class);
        // $form->remove('captcha');
        $formElements = $this->getFormElementsNames($form);
        foreach ($formElements as $element) {
            $elementType = $form->get($element)->getAttribute('type');
            $elementName = $element;
            $this->setDojoAttribute($form, $elementName, $elementType);
            if ($elementType == 'button' || $elementType == 'submit') {
                $form->get($element)->setAttribute('class', 'myButton dojoFieldLong');
            } else {
                $form->get($element)->setAttribute('class', 'dojoFieldLong');
            }
        }
        // $form->setValidationGroup(['email']);
        $form->setAttributes(array(
            'class' => 'login_form'
        ));
        return $form;
    }
}
