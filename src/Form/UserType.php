<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('first_name', TextType::class, [
				'label' => 'Имя',
				'required' => true
			])
			->add('last_name', TextType::class, [
				'label' => 'Фамилия',
				'required' => true
			])
			->add('middle_name', TextType::class, [
				'label' => 'Отчество',
				'required' => false
			])
			->add('date_of_birth', BirthdayType::class, [
				'label' => 'Дата рождения',
				'required' => false
			])
			->add('sex', ChoiceType::class, [
				'choices' => [
					'М' => 'М',
					'Ж' => 'Ж'
				],
				'label' => 'Пол',
				'required' => false
			])
			->add('phone', TextType::class, [
				'label' => 'Телефон',
				'required' => false
			])
			->add('submit', SubmitType::class, [
				'attr' => [
					'class' => 'btn btn-dark',
				],
				'label' => 'Обновить',
			]);
	}

	public function getParent()

	{
		return 'FOS\UserBundle\Form\Type\ProfileFormType';
	}

	public function getBlockPrefix()

	{
		return 'app_user_edit';
	}

	public function getName()

	{
		return $this->getBlockPrefix();
	}
}