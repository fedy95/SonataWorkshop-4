<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('submit', SubmitType::class, [
				'attr' => [
					'class' => 'btn btn-dark',
				],
				'label' => 'Зарегистрироваться',
			]);
	}

	public function getParent()

	{
		return 'FOS\UserBundle\Form\Type\RegistrationFormType';
	}

	public function getBlockPrefix()

	{
		return 'app_user_registration';
	}

	public function getName()

	{
		return $this->getBlockPrefix();
	}
}