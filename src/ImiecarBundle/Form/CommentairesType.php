<?php

namespace ImiecarBundle\Form;

use FOS\UserBundle\Tests\TestUser;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Fixtures\Type;
use Symfony\Component\OptionsResolver\OptionsResolver;
use UserBundle\Entity\User;

class CommentairesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('date',DateTimeType::class,array(
            'label'=>'date',
            'format'=> 'dd:MM:yyyy',
            'input'=>'datetime',
            'data'=> new \DateTime( "now+2hours")


        ))
            ->add('text','Symfony\Component\Form\Extension\Core\Type\TextareaType');


    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ImiecarBundle\Entity\Commentaires'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'imiecarbundle_commentaires';
    }


}
