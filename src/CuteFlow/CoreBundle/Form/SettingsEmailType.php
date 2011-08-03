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
            'label'=>'Email format'
        ));
        $builder->add('emailFooter', 'textarea', array(
            'label'=>'Email footer',
            'required'=>false,
        ));
        
        $builder->add('smtpHost', 'text', array(
            'label'=>'Host'
        ));
        $builder->add('smtpPort', 'text', array(
            'label'=>'Port'
        ));
        $builder->add('smtpUser', 'text', array(
            'label'=>'Username',
            'required'=>false,
        ));
        $builder->add('smtpPassword', 'password', array(
            'label'=>'Password',
            'required'=>false,
        ));
        $builder->add('smtpAuthentication', 'checkbox', array(
            'label'=>'Authentication',
            'required'=>false,
        ));
        $builder->add('smtpEncryption', 'choice', array(
            'choices'=>array('none'=>'None', 'ssl'=>'SSL', 'tls'=>'TLS'),
            'label'=>'Encryption',
            'required'=>false,
        ));
    }
}
