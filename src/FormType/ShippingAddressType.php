<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\ShippingAddress;

class ShippingAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('country_code', TextType::class, ['property_path' => 'countryCode']);

        $builder->add('state');

        $builder->add('city');

        $builder->add('street_line_1', TextType::class, ['property_path' => 'streetLine1']);

        $builder->add('street_line_2', TextType::class, ['property_path' => 'streetLine2']);

        $builder->add('post_code', TextType::class, ['property_path' => 'postCode']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => ShippingAddress::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}