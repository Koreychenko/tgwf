<?php


namespace TelegramWorkflow\FormType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\ChatPermissions;

class ChatPermissionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('can_send_messages', CheckboxType::class, ['property_path' => 'canSendMessages']);

        $builder->add('can_send_media_messages', CheckboxType::class, ['property_path' => 'canSendMediaMessages']);

        $builder->add('can_send_polls', CheckboxType::class, ['property_path' => 'canSendPolls']);

        $builder->add('can_send_other_messages', CheckboxType::class, ['property_path' => 'canSendOtherMessages']);

        $builder->add('can_add_web_page_previews', CheckboxType::class, ['property_path' => 'canAddWebPagePreviews']);

        $builder->add('can_change_info', CheckboxType::class, ['property_path' => 'canChangeInfo']);

        $builder->add('can_invite_users', CheckboxType::class, ['property_path' => 'canInviteUsers']);

        $builder->add('can_pin_messages', CheckboxType::class, ['property_path' => 'canPinMessages']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => ChatPermissions::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}