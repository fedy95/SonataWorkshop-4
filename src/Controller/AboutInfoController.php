<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\AboutInfoRepository;

/**
 * Class AboutInfoController
 * @package App\Controller
 */
final class AboutInfoController extends AbstractController
{
	private $aboutInfoRepository;

	public function __construct(AboutInfoRepository $aboutInfoRepository)
	{
		$this->aboutInfoRepository = $aboutInfoRepository;
	}

	/**
	 * @Route("/", name="main");
	 * @Template("components/base.html.twig")
	 *
	 * @return Response
	 */
	public function showAction()
	{
		$aboutInfoRows = $this->aboutInfoRepository->getAllAboutInfo();
		return $this->render('components/base.html.twig', [
			'aboutInfoRows' => $aboutInfoRows
		]);
	}
}
