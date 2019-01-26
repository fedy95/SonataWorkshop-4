<?php

namespace App\Form;

use App\Entity\Comment;
use App\Entity\House;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	        ->add('title', TextType::class, [
		        'label' => 'Заголовок',
		        'required' => true
	        ])
	        ->add('description', TextType::class, [
		        'label' => 'Описание',
		        'required' => true
	        ])
	        ->add('house', EntityType::class, [
		        'class' => House::class,
		        'label' => 'Строение',
		        'choice_label' => 'name',
		        'required' => true
	        ])
	        ->add('submit', SubmitType::class, [
		        'attr' => [
			        'class' => 'btn btn-dark',
		        ],
		        'label' => 'Добавить комментарий',
	        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
