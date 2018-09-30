<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', TextType::class, array('label' => 'Nom', 'attr' => array('class' => 'form-control' ,'style' => 'margin-bottom:15px')))
                ->add('ville', EntityType::class, array(
                    'class'=> 'AppBundle:villes',
                    'choice_label'=>'ville_nom',
                    'expanded'=>FALSE,
                    'multiple'=>FALSE,
                    'attr' => array( 'class' => 'form-control','style' => 'margin-bottom:15px'    
                    )))
                ->add('email', TextType::class, array('label' => 'Email', 'attr' => array( 'class' => 'form-control','style' => 'margin-bottom:15px')))
                ->add('telephone', TextType::class, array('label' => 'Téléphone', 'attr' => array( 'class' => 'form-control','style' => 'margin-bottom:15px')))
                ->add('suject', TextType::class, array('label' => 'Titre', 'attr' => array( 'class' => 'form-control','style' => 'margin-bottom:15px')))
                ->add('message', TextareaType::class, array('label' => 'Message', 'attr' => array( 'class' => 'form-control','style' => 'margin-bottom:15px')))
                ->add('Save', SubmitType::class, array('label' => 'Valider'));
        
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_contact';
    }


}
