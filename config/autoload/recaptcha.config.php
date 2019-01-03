<?php
// ./config/autoload/recaptcha.config.php
return array(
    'di'=> array(
        'instance'=>array(
            'alias'=>array(
                // OTHER ELEMENTS....
                'recaptcha_element' => 'Zend\Form\Element\Captcha',
            ),
            'recaptcha_element' => array(
                'parameters' => array(
                    'spec' => 'captcha',
                    'options'=>array(
                        'label'      => '',
                        'required'   => true,
                        'order'      => 500,
                        'captcha'    => array(
                            'captcha' => 'ReCaptcha',
                            'privkey' => RECAPTCHA_PRIVATE_KEY,
                            'pubkey'  => RECAPTCHA_PUBLIC_KEY,
                        ),
                    ),
                ),
            ),
            'ZfcUser\Form\Register' => array(
                'parameters' => array(
                    'captcha_element'=>'recaptcha_element',
                ),
            ),
        ),
    ),
);