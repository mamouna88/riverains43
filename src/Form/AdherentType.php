<?php

namespace App\Form;

use App\Entity\Adherent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdherentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstName')
            ->add('address')
            ->add('phoneNumber')
            ->add('emailAddress', EmailType::class, array('label' => 'emailAddress', 'translation_domain' => 'FOSUserBundle'))
            ->add('password', RepeatedType::class, array(
        'type' => PasswordType::class,
        'options' => array(
            'translation_domain' => 'FOSUserBundle',
            'attr' => array(
                'autocomplete' => 'new-password',
            ),
        ),
        'first_options' => array('label' => 'password'),
        'second_options' => array('label' => 'password_confirmation'),
        'invalid_message' => 'fos_user.password.mismatch',
    ))
            ->add('create', SubmitType::class, ["label" => "ajouter un adhérent",
                "attr" => ["class" => "btn-success"]]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Adherent::class,
        ]);
    }
}
