<?php


namespace TelegramWorkflow\FormType;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\ChatPhoto;

class ChatPhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('small_file_id', TextType::class, ['property_path' => 'smallFileId']);
        $builder->add('small_file_unique_id', TextType::class, ['property_path' => 'smallFileUniqueId']);
        $builder->add('big_file_id', TextType::class, ['property_path' => 'bigFileId']);
        $builder->add('big_file_unique_id', TextType::class, ['property_path' => 'bigFileUniqueId']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => ChatPhoto::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}