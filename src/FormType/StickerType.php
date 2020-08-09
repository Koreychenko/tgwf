<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\Sticker;

class StickerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file_id', TextType::class, ['property_path' => 'fileId']);

        $builder->add('file_unique_id', TextType::class, ['property_path' => 'fileUniqueId']);

        $builder->add('width', IntegerType::class);

        $builder->add('height', IntegerType::class);

        $builder->add('is_animated', CheckboxType::class, ['property_path' => 'isAnimated']);

        $builder->add('thumb', PhotoSizeType::class);

        $builder->add('emoji');

        $builder->add('set_name', TextType::class, ['property_path' => 'setName']);

        $builder->add('mask_position', MaskPositionType::class, ['property_path' => 'maskPosition']);

        $builder->add('file_size', IntegerType::class, ['property_path' => 'fileSize']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => Sticker::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}