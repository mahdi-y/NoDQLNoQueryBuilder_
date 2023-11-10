<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Stade;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('Surname')
            ->add('Stade', EntityType::class, [
                'class' => Stade::class,
                'choice_label' => 'name',
                'placeholder' => 'Select a stadium',
            ])
            ->add('Save', SubmitType::class)
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Player::class,
        ]);
    }
}
