<?php

namespace TelegramWorkflow\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TelegramWorkflow\Entity\Dto\InlineQuery;

class InlineQueryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('id');
        $builder->add('from', UserType::class);
        $builder->add('location', LocationType::class);
        $builder->add('query');
        $builder->add('offset');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class'         => InlineQuery::class,
                                   'allow_extra_fields' => true,
                               ]);
    }
}