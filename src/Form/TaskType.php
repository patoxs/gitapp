<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('date_create')
            ->add('date_start')
            ->add('date_end')
            ->add('estimated_hours')
            ->add('email_notify_user')
            ->add('email_notify_team')
            ->add('icon')
            ->add('color')
            ->add('id_incidence')
            ->add('id_tasktype')
            ->add('id_priority')
            ->add('id_project')
            ->add('id_user_creator')
            ->add('id_status')
            ->add('id_branch')
            ->add('id_task_father')
            ->add('id_commit')
            ->add('id_user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
