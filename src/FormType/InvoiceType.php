<?php


namespace TelegramWorkflow\FormType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\Invoice;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');

        $builder->add('description');

        $builder->add('start_parameter', TextType::class, ['property_path' => 'startParameter']);

        $builder->add('currency');

        $builder->add('total_amount', IntegerType::class, ['property_path' => 'totalAmount']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => Invoice::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}