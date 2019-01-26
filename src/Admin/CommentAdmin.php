<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\User;
use App\Entity\House;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Class CommentAdmin
 * @package App\Admin
 */
final class CommentAdmin extends AbstractAdmin
{
	protected function configureDatagridFilters(DatagridMapper $datagridMapper) : void
	{
		$datagridMapper
			->add('id')
			->add('title')
			->add('description')
			->add('date')
			->add('user.email')
			->add('house.name');
	}

	protected function configureListFields(ListMapper $listMapper) : void
	{
		$listMapper
			->add('id')
			->add('title')
			->add('description')
			->add('date')
			->add('user.email')
			->add('house.name')
			->add('_action', null, [
				'actions' => [
					'show' => [],
					'edit' => [],
					'delete' => [],
				],
			]);
	}

	protected function configureFormFields(FormMapper $formMapper) : void
	{
		$formMapper
			->add('title', TextType::class, [
				'label' => 'Заголовок',
				'required' => true
			])
			->add('description', TextType::class, [
				'label' => 'Описание',
				'required' => true
			])
			->add('date', DateTimeType::class, [
				'label' => 'Время добавления комментария',
				'required' => true
			])
			->add('user', EntityType::class, [
				'class' => User::class,
				'label' => 'Создатель',
				'choice_label' => 'email',
				'required' => true
			])
			->add('house', EntityType::class, [
				'class' => House::class,
				'label' => 'Строение',
				'choice_label' => 'name',
				'required' => true
			]);
	}

	protected function configureShowFields(ShowMapper $showMapper) : void
	{
		$showMapper
			->add('id')
			->add('title')
			->add('description')
			->add('date')
			->add('user.email')
			->add('house.name');
	}
}
