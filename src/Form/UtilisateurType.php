<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => false,
                'invalid_message' => 'The password fields must match.',
                'invalid_message_parameters' => ['first_options' == 'second_options'],
                'options' => ['attr' => ['class' => 'password-field']],
                'first_options'  => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
                'empty_data' => '',
                'mapped' => false,
            ])
            ->add('lastname')
            ->add('email', EmailType::class)
            ->add('date_de_naissance', BirthdayType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('genre', ChoiceType::class, [
                'choices' => [
                    'Femme' => 'Femme',
                    'Homme' => 'Homme'
                ],
                // 'choice_label' => 'genre',
                'expanded' => true,
                'multiple' => false,
            ])
            /* ->get('genre')->addModelTransformer(new CallbackTransformer(
                // transform the array to a string
                function ($genreAsArray) {
                    return implode(', ', $genreAsArray);
                },
                // transform the string back to an array
                function ($genreAsString) {
                    return explode(', ', $genreAsString);
                }
            )) */
            ->add('adresse', TextareaType::class) // utiliser l'api : https://api-adresse.data.gouv.fr/search/?q=nomdevotreadresse
            ->add('code_postal', IntegerType::class)
            ->add('ville', TextType::class)
            ->add('promotions', CheckboxType::class, [
                'label' => 'Recevoir les messages promotionnels',
                'required' => false,
            ])
            ->add('alerteSMS', CheckboxType::class, [
                'label' => 'Recevoir les alertes SMS',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
