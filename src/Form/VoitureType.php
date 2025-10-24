<?php

namespace App\Form;

use App\Entity\Voiture;

use Dom\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
                'attr' => [
                    'placeholder' => 'Ex : Renault Clio',
                    'class' => 'form-control',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Ex : Voiture de tourisme',
                    'class' => 'form-control',
                ],
            ])
            ->add('prix_quotidien', NumberType::class, [
                'label' => 'Prix par jour (€)',
                'scale' => 2,
                'attr' => ['min' => 0],
            ])
            ->add('prix_mensuel', NumberType::class, [
                'label' => 'Prix par mois (€)',
                'scale' => 2,
                'attr' => ['min' => 0],
            ])
            ->add('places', IntegerType::class, [
                'label' => 'Nombre de places',
                'attr' => ['min' => 1],
            ])
            ->add('is_manuelle', CheckboxType::class, [
                'label' => 'Boîte manuelle',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
