<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class YoneticiFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password')
            ->add('email')
            ->add('yoneticiAdi',TextType::class,[
                'label' => 'Yonetici Adi',
                "mapped" => false
            ])
            ->add('verilecekUcret',IntegerType::class,[
                'label' => 'Verilecek Ucret',
                'mapped' => false
            ])
            ->add('telefon',TextType::class,[
                'label' => 'Telefon',
                'mapped' => false
            ])
            ->add('adres',TextType::class,[
                'label' => "Adres",
                'mapped' => false
            ])
            ->add('submit',SubmitType::class,[
                'label' => 'Kaydet'
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
