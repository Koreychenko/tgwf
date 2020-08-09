<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\Animation;

class AnimationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file_id', TextType::class, ['property_path' => 'fileId']);

        $builder->add('file_unique_id', TextType::class, ['property_path' => 'fileUniqueId']);

        $builder->add('width', IntegerType::class);

        $builder->add('height', IntegerType::class);

        $builder->add('duration', IntegerType::class);

        $builder->add('thumb', PhotoSizeType::class);

        $builder->add('file_name', TextType::class, ['property_path' => 'fileName']);

        $builder->add('mime_type', TextType::class, ['property_path' => 'mimeType']);

        $builder->add('file_size', IntegerType::class, ['property_path' => 'fileSize']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => Animation::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}