<?php

namespace CuteFlow\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Description of SettingsGeneralType
 *
 * @author thaberkern
 */
class SettingsEmailType extends AbstractType
{
    public function getName()
    {
        return 'adminEmail';
    }
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('emissionMailAddress', 'text', array(
            'label'=>'Emission email address'
        ));
        $builder->add('emailFormat', 'choice', array(
            'choices'=>array('text/plain'=>'Plain', 'text/html'=>'HTML'),
            'label'=>'E-Mail format'            
        ));
        $builder->add('emailFooter', 'textarea', array(
            'label'=>'Email footer'
        ));
        
        $builder->add('smtpHost', 'text', array(
            'label'=>'Host'
        ));
        $builder->add('smtpPort', 'text', array(
            'label'=>'Port'
        ));
        $builder->add('smtpUser', 'text', array(
            'label'=>'Username'
        ));
        $builder->add('smtpPassword', 'password', array(
            'label'=>'Password'
        ));
        $builder->add('smtpAuthentication', 'checkbox', array(
            'label'=>'Authentification'
        ));
        $builder->add('smtpEncryption', 'choice', array(
            'choices'=>array('none'=>'None', 'ssl'=>'SSL', 'tls'=>'TLS'),
            'label'=>'Encryption'
        ));
    }
}
