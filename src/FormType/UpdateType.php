<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\Update;

class UpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('update_id', IntegerType::class, ['property_path' => 'updateId']);
        $builder->add('message', MessageType::class);
//        $builder->add('edited_message', MessageType::class, ['property_path' => 'editedMessage']);
//        $builder->add('channel_post', MessageType::class);
//        $builder->add('edited_channel_post', MessageType::class);
//        $builder->add('inline_query', InlineQueryType::class, ['property_path' => 'inlineQuery']);
//        $builder->add('chosen_inline_result', ChosenInlineResultType::class);
        $builder->add('callback_query', CallbackQueryType::class, ['property_path' => 'callbackQuery']);
//        $builder->add('shipping_query', ShippingQueryType::class);
//        $builder->add('pre_checkout_query', PreCheckoutQueryType::class);
//        $builder->add('poll', PollType::class);
//        $builder->add('poll_answer', PollAnswerType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class' => Update::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}