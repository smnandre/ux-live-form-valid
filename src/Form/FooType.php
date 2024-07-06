<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class FooType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Your name',
                'constraints' => [
                    new Length(min: 2),
                    new NotBlank(),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Your email',
                'constraints' => [
                    new NotBlank(),
                    new Email(),
                ],
            ])
            ->add('zip_code', TextType::class, [
                'label' => 'Your ZIP code',
                'constraints' => [
                    new Length(min: 2),
                    new NotBlank(),
                ],
            ])
            ->add('city', TextType::class, [
                'label' => 'Your city',
                'constraints' => [
                    new Length(min: 2),
                    new NotBlank(),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
