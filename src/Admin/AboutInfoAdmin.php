<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\AboutInfo;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class DepartmentAdmin
 * @package App\Admin
 */
final class AboutInfoAdmin extends AbstractAdmin
{
	protected function configureDatagridFilters(DatagridMapper $datagridMapper) : void
	{
		$datagridMapper
			->add('title')
			->add('pos');
	}

	protected function configureListFields(ListMapper $listMapper) : void
	{
		$listMapper
			->add('id')
			->add('title')
			->add('pos')
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
			->add('text', TextType::class, [
				'label' => 'Содержание',
				'required' => true
			])
			->add('pos', TextType::class, [
				'label' => 'Порядковый номер для вывода',
				'required' => true
			]);
	}

	protected function configureShowFields(ShowMapper $showMapper) : void
	{
		$showMapper
			->add('id')
			->add('title')
			->add('text')
			->add('pos');
	}

	public function toString($object)
	{
		return $object instanceof AboutInfo
			? $object->getTitle()
			: 'Заголовок';
	}
}