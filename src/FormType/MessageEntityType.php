<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\MessageEntity;

class MessageEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('language');
        $builder->add('length', IntegerType::class);
        $builder->add('offset', IntegerType::class);
        $builder->add('type');
        $builder->add('url');
        $builder->add('user', UserType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => MessageEntity::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}