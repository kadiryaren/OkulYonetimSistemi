<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OgretmenFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            ->add('email')
            ->add('ogretmen_adi',TextType::class,[
                'label' => 'Ogretmen Adi',
                'mapped' => false
            ])
            ->add('verilecek_ucret',TextType::class,[
                'label' => 'Verilecek Ucret',
                'mapped' => false
            ])
            ->add('telefon',TextType::class,[
                'label' => "Telefon",
                "mapped" => false
            ])
            ->add('adres',TextType::class,[
                'label' => 'Adres',
                "mapped" => false
            ])
            ->add('submit',SubmitType::class,[
                'label' => 'Kaydet!'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
