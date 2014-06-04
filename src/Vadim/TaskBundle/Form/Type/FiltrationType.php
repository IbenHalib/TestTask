<?php

namespace Vadim\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
//use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class FiltrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filtrationData', 'date', [
                    'constraints' => [
                       new NotBlank(),
                    ],
                  ])
            ->add('filtrationType', 'choice', [
                'choices'   => [
                    'Before'   => 'Before',
                    'After' => 'After',
                    'Equal'   => 'Equal',
                ],
                'preferred_choices' => ['Before'],
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('submit', 'submit')
        ;

    }

    public function getName()
    {
        return 'vadim_test_bundle_filtration';
    }

}
