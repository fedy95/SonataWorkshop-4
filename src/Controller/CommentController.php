<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CommentController extends AbstractController
{
	private $commentRepository;

	public function __construct(CommentRepository $commentRepository)
	{
		$this->commentRepository = $commentRepository;
	}

	/**
	 * @Route("/comment/add", name="add.comment", methods={"GET", "POST"})
	 * @Template(":components/comments:add_comment.html.twig")
	 *
	 * @param Request $request
	 *
	 * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
	 */
	final public function createComment(Request $request)
	{
		$user = $this->container->get('security.token_storage')->getToken()->getUser();
		$comment = new Comment();
		$comment->setUser($user);
		$form = $this->createForm(CommentType::class, $comment, [
			'method' => $request->getMethod(),
		]);
		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($comment);
			$em->flush();

			$this->addFlash(
				'success',
				'Комментарий добавлен'
			);

			return $this->redirectToRoute('add.comment');
		}
		return [
			'form' => $form->createView()
		];
	}

	/**
	 * @Route("/comment/show", name="show.comment");
	 * @Template("/components/comments:show_comments.html.twig")
	 *
	 * @return Response
	 */
	final public function showComments()
	{
		$comments = $this->commentRepository->getAllComments();
		return $this->render('/components/comments/show_comments.html.twig', [
			'comments' => $comments,
		]);
	}
}