<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\OrderInfo;

class OrderInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');

        $builder->add('phone_number', TextType::class, ['property_path' => 'phoneNumber']);

        $builder->add('email');

        $builder->add('shipping_address', ShippingAddressType::class, ['property_path' => 'shippingAddress']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => OrderInfo::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}