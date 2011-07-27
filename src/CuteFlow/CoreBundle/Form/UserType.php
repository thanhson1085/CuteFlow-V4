<?php

namespace CuteFlow\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function getName()
    {
        return 'user';
    }

    public function buildForm(FormBuilder $builder, array $options)
    {

        $builder->add('lastName', 'text', array(
                                    'label'=>'Lastname'
                                          ));
    }
}
