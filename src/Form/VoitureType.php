<?php

namespace App\Form;

use App\Entity\Voiture;
use Doctrine\ORM\Query\Expr\Select;
use Dom\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                    'label' => 'Nom du véhicule',
                ])
            ->add('description', TextareaType::class, [
                    'label' => 'Description',
                ])
            ->add('prix_quotidien', NumberType::class, [
                    'label' => 'Prix par jour (€)',
                    'scale' => 1,
                    'attr' => ['min' => 0],
                ])
            ->add('prix_mensuel', NumberType::class, [
                    'label' => 'Prix par mois (€)',
                    'scale' => 1,
                    'attr' => ['min' => 0],
                ])
            ->add('places', ChoiceType::class, [
                    'label' => 'Nombre de places',
                    'choices' => [
                            '1' => 1,
                            '2' => 2,
                            '3' => 3,
                            '4' => 4,
                            '5' => 5,
                            '6' => 6,
                            '7' => 7,
                            '8' => 8,
                            '9' => 9,
                        ],
                ])
            ->add('is_manuelle', ChoiceType::class, [
                    'label' => 'Boite de vitesse',
                    'choices' => [
                            'Manuelle' => true,
                            'Automatique' => false
                        ]

                ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
