<?php


namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

class Form extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('property', CollectionType::class, array(
            'allow_add' => true,
                'label' => false
        ))
            ->add('option', CollectionType::class, array(
                'allow_add' => true,
                'label' => false

            ))
            ->add('value', CollectionType::class, array(
                'allow_add' => true,
                'label' => false

            ))
            ->getForm()
        ;
    }
}
