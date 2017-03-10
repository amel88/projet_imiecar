<?php

namespace ImiecarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoixTrajetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm1(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date',  DateType::class, array(
            'format' => 'dd-MM-yyyy',))
            ->add('villeDepart')
            ->add('heureDepart')
            ->add('villeArrivee')
            ->add('heureArrivee');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions1(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ImiecarBundle\Entity\Trajet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix1()
    {
        return 'imiecarbundle_trajet';
    }


}
