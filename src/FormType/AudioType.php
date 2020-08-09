<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\Audio;

class AudioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file_id', TextType::class, ['property_path' => 'fileId']);

        $builder->add('file_unique_id', TextType::class, ['property_path' => 'fileUniqueId']);

        $builder->add('duration', IntegerType::class);

        $builder->add('performer');

        $builder->add('title');

        $builder->add('mime_type', TextType::class, ['property_path' => 'mimeType']);

        $builder->add('file_size', IntegerType::class, ['property_path' => 'fileSize']);

        $builder->add('thumb', PhotoSizeType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => Audio::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}