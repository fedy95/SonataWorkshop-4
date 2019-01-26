<?php

declare(strict_types=1);

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class HouseAdmin
 * @package App\Admin
 */
final class HouseAdmin extends AbstractAdmin
{

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) : void
	{
		$datagridMapper
			->add('id')
			->add('name');
	}

	protected function configureListFields(ListMapper $listMapper) : void
	{
		$listMapper
			->add('id')
			->add('name')
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
				'label' => 'Наименование строения',
				'required' => true
			]);
	}

	protected function configureShowFields(ShowMapper $showMapper) : void
	{
		$showMapper
			->add('id')
			->add('name');
	}
}
