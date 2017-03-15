<?php

namespace ImiecarBundle\Form;

use ImiecarBundle\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrajetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date',  DateType::class, array(
            'format' => 'dd-MM-yyyy',))
            ->add('villeDepart',EntityType::class, array(
                "class" => Ville::class,
                "choice_label" => 'ville'
            ))
            ->add('heureDepart')
            ->add('villeIntermediaire', EntityType::class, array(
                "class" => Ville::class,
                "choice_label" => 'ville'
            ))
            ->add('heureIntermediaire')
            ->add('villeArrivee')
            ->add('heureArrivee')
            ->add('nbPlaces', IntegerType::class, array(
                'attr' => array('min' => 1, 'max' => 8)))
            ->add('idUtilisateur');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ImiecarBundle\Entity\Trajet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'imiecarbundle_trajet';
    }


}
