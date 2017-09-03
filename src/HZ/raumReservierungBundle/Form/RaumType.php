<?php

namespace HZ\raumReservierungBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RaumType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nummer')->add('name')->add('gebaeude',EntityType::class, array(
                                                                'class' => 'HZraumReservierungBundle:Gebaeude',
                                                                'choice_label' => 'name',
                                                                'multiple'=>false
                                                              )
                          );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HZ\raumReservierungBundle\Entity\Raum'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hz_raumreservierungbundle_raum';
    }


}
