<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\CallbackQuery;

class CallbackQueryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id');
        $builder->add('from', UserType::class);
        $builder->add('message', MessageType::class);
        $builder->add('inline_message_id', TextType::class, ['property_path' => 'inlineMessageId']);
        $builder->add('chat_instance', TextType::class, ['property_path' => 'chatInstance']);
        $builder->add('data');
        $builder->add('game_short_name', TextType::class, ['property_path' => 'gameShortName']);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => CallbackQuery::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}