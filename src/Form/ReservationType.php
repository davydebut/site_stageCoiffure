<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Reservation;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use function Symfony\Component\String\s;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('heure_de_rendez_vous', DateTimeType::class, [
                'widget' => 'choice',
                'hours' => range(8,19),
                'date_widget' => 'single_text',
                'date_label' => 'Date',
                'time_label' => 'Heure',
                'time_widget' => 'choice',
            ])
            ->add('prestation')
            ->add('pro', EntityType::class, [
                'class' => Client::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('pro')
                    ->where('pro.isPro = true');
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
