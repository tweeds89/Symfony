<?php

namespace CarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;

class CarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', TextType::class, [
                'required'=>true,
                'constraints'=>
                [
                    new NotBlank()
                ]
            ])
            ->add('year', TextType::class, [
                'required'=>true,
                'constraints'=>
                [
                    new NotBlank()
                ]
            ])
            ->add('navigation')
            ->add('description')
            ->add('make', EntityType::class, [
                'required'=>true,
                'class'=>'CarBundle\Entity\Make'
            ])
            ->add('model', EntityType::class, [
                'required'=>true,
                'class'=>'CarBundle\Entity\Model'
            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CarBundle\Entity\Car'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'carbundle_car';
    }


}
