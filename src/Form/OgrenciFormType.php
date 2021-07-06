<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;




use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;

class OgrenciFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password',PasswordType::class,[
                'label' => 'Sifre'
            ])
            ->add('email',EmailType::class,[
                "label" => 'email'
            ])
            
            ->add('ogrenci_adi',TypeTextType::class,[
                'label' => 'Ogrenci Adi',
                "mapped" => false
            ])
            ->add("telefon",TypeTextType::class,[
                'label' => "Telefon",
                'mapped' => false
            ])
            ->add("adres",TypeTextType::class,[
                'label' => "Adres",
                "mapped" => false
            ])
            ->add("kredi",IntegerType::class,[
                'label' => "Kredi",
                "mapped" => false
            ])
            ->add('Kayit',SubmitType::class,[
                "label" => "Kaydet!"
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
