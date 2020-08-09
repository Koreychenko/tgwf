<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\Message;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('message_id', IntegerType::class, ['property_path' => 'messageId']);
        $builder->add('from', UserType::class);
        $builder->add('date', IntegerType::class);
        $builder->add('chat', ChatType::class);
        $builder->add('text');
        $builder->add('entities', CollectionType::class, [
            'entry_type' => MessageEntityType::class,
            'allow_add' => true,
            'error_bubbling' => true,
        ]);
        $builder->add('document', DocumentType::class);
        $builder->add('photo', CollectionType::class, [
            'entry_type' => PhotoSizeType::class,
            'allow_add' => true,
            'error_bubbling' => true,
        ]);
//        $builder->add('contact', ContactType::class);
//        $builder->add('dice', DiceType::class);
//        $builder->add('game', GameType::class);
//        $builder->add('poll', PollType::class);
//        $builder->add('venue', VenueType::class);
        $builder->add('location', LocationType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class' => Message::class,
                                   'allow_extra_fields' => true,
                               ]);
    }

}