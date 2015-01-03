<?php

namespace OVDA\IndexBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array(
                'label' => false,
                'attr' => array(
                    'id' => 'accountEmail',
                    'placeholder' => 'Email'
                )
            ))
            ->add('password', 'password', array(
                'label' => false,
                'attr' => array(
                    'id' => 'accountPassword',
                    'placeholder' => 'Mot de passe'
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OVDA\IndexBundle\Entity\Account',
            'cascade_validation' => true
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ovda_indexbundle_account';
    }
}
