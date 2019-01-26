<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Department;
use App\Entity\Document;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Vich\UploaderBundle\Form\Type\VichFileType;

/**
 * Class DocumentAdmin
 * @package App\Admin
 */
final class DocumentAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
			->add('id')
			->add('title')
			->add('department.name')
			->add('date')
			;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
			->add('id')
			->add('title')
			->add('department.name')
			->add('date')
			->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {
	    $formMapper
		    ->add('title', TextType::class, [
			    'label' => 'Наименование документа',
			    'required' => true
		    ])
		    ->add('file', VichFileType::class, [
			    'label' => 'Документ до 20 Мб',
			    'allow_delete'  => false,
			    'download_link' => true,
			    'required' => true
		    ])
		    ->add('department', EntityType::class, [
			    'class' => Department::class,
			    'label' => 'Отдел, создавший документ',
			    'choice_label' => 'name',
			    'required' => true
		    ]);
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
			->add('id')
			->add('title')
			->add('department.name')
			->add('date')
			;
    }

	public function toString($object)
	{
		return $object instanceof Document
			? $object->getTitle()
			: 'Документ';
	}
}
