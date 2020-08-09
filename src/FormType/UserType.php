<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\User;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name', TextType::class, ['property_path' => 'firstName']);

        $builder->add('id', IntegerType::class);

        $builder->add('is_bot', CheckboxType::class, ['property_path' => 'isBot']);

        $builder->add('language_code', TextType::class, ['property_path' => 'languageCode']);

        $builder->add('last_name', TextType::class, ['property_path' => 'lastName']);

        $builder->add('username');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => User::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}