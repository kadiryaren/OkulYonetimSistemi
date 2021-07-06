<?php

namespace App\Form;

use App\Entity\DersKatologu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DersKatologuFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dersAdi')
            ->add('dersFiyati')
            ->add('ogretmenUcreti')
            ->add('hangiSiniftaAlinabilir')
            ->add('dersKredisi')
            ->add('dersGunu',DateType::class)
            ->add('submit',SubmitType::class,[
                'label' => 'Kaydet'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DersKatologu::class,
        ]);
    }
}
