<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentInformationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('credit_card_number', TextType::class, [
                'label' => 'Credit Card Number',
            ])
            ->add('expiry_date', TextType::class, [
                'label' => 'Expiry Date (MM/YYYY)',
            ])
            ->add('cvv', IntegerType::class, [
                'label' => 'CVV',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
