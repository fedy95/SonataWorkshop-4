<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Department;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/**
 * Class DepartmentAdmin
 * @package App\Admin
 */
final class DepartmentAdmin extends AbstractAdmin
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
			->add('name', TextType::class, [
				'required' => true
			]);
	}

	protected function configureShowFields(ShowMapper $showMapper) : void
	{
		$showMapper
			->add('id')
			->add('name');
	}

	public function toString($object)
	{
		return $object instanceof Department
			? $object->getName()
			: 'Отдел';
	}
}
