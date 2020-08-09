<?php


namespace TelegramWorkflow\FormType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\SuccessfulPayment;

class SuccessfulPaymentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('currency');

        $builder->add('total_amount', IntegerType::class, ['property_path' => 'totalAmount']);

        $builder->add('invoice_payload', TextType::class, ['property_path' => 'invoicePayload']);

        $builder->add('shipping_option_id', TextType::class, ['property_path' => 'shippingOptionId']);

        $builder->add('order_info', OrderInfoType::class, ['property_path' => 'orderInfo']);

        $builder->add('telegram_payment_charge_id', TextType::class, ['property_path' => 'telegramPaymentChargeId']);

        $builder->add('provider_payment_charge_id', TextType::class, ['property_path' => 'providerPaymentChargeId']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => SuccessfulPayment::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}