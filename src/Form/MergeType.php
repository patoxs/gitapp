<?php

namespace App\Form;

use App\Entity\Merge;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MergeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('id_branch_merge')
            ->add('id_branch_task')
            ->add('id_project')
            ->add('id_user')
            ->add('id_type_branch')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Merge::class,
        ]);
    }
}
