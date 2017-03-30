<?php

namespace ImiecarBundle\Controller;

use ImiecarBundle\Entity\Commentaires;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\User;

/**
 * Commentaire controller.
 *
 * @Route("commentaires")
 */
class CommentairesController extends Controller
{
    /**
     * Lists all commentaire entities.
     *
     * @Route("/", name="commentaires_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commentaires = $em->getRepository('ImiecarBundle:Commentaires')->findAll();

        return $this->render('commentaires/index.html.twig', array(
            'commentaires' => $commentaires,
        ));
    }

    /**
     * Creates a new commentaire entity.
     *
     * @Route("/new", name="commentaires_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $commentaires = new Commentaires();
        $form = $this->createForm('ImiecarBundle\Form\CommentairesType', $commentaires);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $commentaires->setIdUsers($this->get('security.token_storage')->getToken()->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaires);
            $em->flush($commentaires);

//            return $this->redirectToRoute('commentaires_show', array('id' => $commentaires->getId()));
            return $this->redirectToRoute('commentaires_index');
        }

        return $this->render('commentaires/new.html.twig', array(
            'commentaire' => $commentaires,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commentaire entity.
     *
     * @Route("/{id}", name="commentaires_show")
     * @Method("GET")
     */
    public function showAction(Commentaires $commentaire)
    {
        $deleteForm = $this->createDeleteForm($commentaire);

        return $this->render('commentaires/show.html.twig', array(
            'commentaire' => $commentaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commentaire entity.
     *
     * @Route("/{id}/edit", name="commentaires_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Commentaires $commentaire)
    {
        $deleteForm = $this->createDeleteForm($commentaire);
        $editForm = $this->createForm('ImiecarBundle\Form\CommentairesType', $commentaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commentaires_edit', array('id' => $commentaire->getId()));
        }

        return $this->render('commentaires/edit.html.twig', array(
            'commentaire' => $commentaire,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commentaire entity.
     *
     * @Route("/{id}", name="commentaires_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Commentaires $commentaire)
    {
        $form = $this->createDeleteForm($commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commentaire);
            $em->flush();
        }

        return $this->redirectToRoute('commentaires_index');
    }

    /**
     * Creates a form to delete a commentaire entity.
     *
     * @param Commentaires $commentaire The commentaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Commentaires $commentaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentaires_delete', array('id' => $commentaire->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
