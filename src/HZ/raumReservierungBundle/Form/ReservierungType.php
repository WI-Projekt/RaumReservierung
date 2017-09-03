<?php

namespace HZ\raumReservierungBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ReservierungType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('startDatum')->add('endDatum')->add('dozent',EntityType::class, array(
                                                                'class' => 'HZraumReservierungBundle:Dozent',
                                                                'choice_label' => 'name',
                                                                'multiple'=>false
                                                              )
                          )->add('student',EntityType::class, array(
                                                                'class' => 'HZraumReservierungBundle:Student',
                                                                'choice_label' => 'name',
                                                                'multiple'=>false
                                                              )
                          )->add('raum',EntityType::class, array(
                                                                'class' => 'HZraumReservierungBundle:Raum',
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
            'data_class' => 'HZ\raumReservierungBundle\Entity\Reservierung'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hz_raumreservierungbundle_reservierung';
    }


}
