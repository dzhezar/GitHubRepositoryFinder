<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('property', CollectionType::class, array(
            // каждая запись в массиве будет полем "email"
//            'entry_type' => ChoiceType::class,
            'allow_add' => true,
                'label' => false
        ))
            ->add('option', CollectionType::class, array(
                // каждая запись в массиве будет полем "email"
//                'entry_type' => ChoiceType::class,
                'allow_add' => true,
                'label' => false

            ))
            ->add('value', CollectionType::class, array(
                // каждая запись в массиве будет полем "email"
                'allow_add' => true,
                'label' => false

            ))
            ->add('submit',SubmitType::class)
            ->getForm()
        ;
    }
}
