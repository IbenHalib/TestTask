<?php

namespace Vadim\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CreatorType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text')
            ->add('dateStartCareer','date')
            ->add('birthDate','date')
            ->add('contactData','textarea')
            ->add('usedTechnology','text')
            ->add('projects', 'entity', [
                'class' => 'Vadim\TaskBundle\Entity\Project',
                'property' => 'name'
            ])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vadim\TaskBundle\Entity\Creator'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vadim_test_bundle_creator';
    }
}
