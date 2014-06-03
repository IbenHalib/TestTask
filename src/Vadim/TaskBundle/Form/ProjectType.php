<?php

namespace Vadim\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientName','text')
            ->add('name','text')
            ->add('dateStart','date')
            ->add('category', 'entity', [
                'class' => 'Vadim\TaskBundle\Entity\Category',
                'property' => 'name'
            ])
            ->add('creators', 'entity', [
                'class' => 'Vadim\TaskBundle\Entity\Creator',
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
            'data_class' => 'Vadim\TaskBundle\Entity\Project'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'vadim_taskbundle_project';
    }
}
