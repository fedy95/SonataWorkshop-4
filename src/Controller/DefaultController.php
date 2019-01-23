<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DocumentController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
	/**
	 * @Route("/", name="main");
	 * @Template("components/base.html.twig")
	 *
	 * @return Response
	 */
	public function showAction()
	{
		return $this->render('base.html.twig', []);
	}
}