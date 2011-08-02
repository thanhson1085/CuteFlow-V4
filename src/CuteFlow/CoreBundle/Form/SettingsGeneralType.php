<?php

namespace CuteFlow\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Description of SettingsGeneralType
 *
 * @author thaberkern
 */
class SettingsGeneralType extends AbstractType
{
    public function getName()
    {
        return 'adminGeneral';
    }
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('defaultLanguage', 'choice', array(
            'label'=>'Default language',
            'choices'=>array('de'=>'Deutsch')
        ));
        
        $builder->add('defaultTheme', 'choice', array(
            'choices'=>array('default'=>'Default',
                              'basecamp'=>'Basecamp',
                              'modulaMartini'=>'Modula Martini',
                              'modulaMojito'=>'Modula Mojito'),
            'label'=>'Default theme'));
        
        $builder->add('useGravatar', 'checkbox', array(
            'label'=>'Use Gravatar user icons'
        ));
        $builder->add('userFormat', 'choice', array(
            'choices'=>array('username'=>'jdoe',
                             'fullname_fl'=>'John Doe',
                             'fullname_lf'=>'Doe, John',
                             'firstname'=>'John',
                             'lastname'=>'Doe'),
            'required'=>true,
            'label'=>'Userformat'
        ));
    }
}
