<?php


namespace TelegramWorkflow\FormType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\MaskPosition;

class MaskPositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('point');

        $builder->add('x_shift', NumberType::class, ['property_path' => 'xShift']);

        $builder->add('y_shift', NumberType::class, ['property_path' => 'yShift']);

        $builder->add('scale', NumberType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => MaskPosition::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}