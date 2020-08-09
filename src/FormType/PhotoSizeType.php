<?php


namespace TelegramWorkflow\FormType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\PhotoSize;

class PhotoSizeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file_id', TextType::class, ['property_path' => 'fileId']);

        $builder->add('file_size', IntegerType::class, ['property_path' => 'fileSize']);

        $builder->add('file_unique_id', TextType::class, ['property_path' => 'fileUniqueId']);

        $builder->add('height', IntegerType::class);

        $builder->add('width', IntegerType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => PhotoSize::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}