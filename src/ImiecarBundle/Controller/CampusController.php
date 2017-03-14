<?php

namespace ImiecarBundle\Controller;

use ImiecarBundle\Entity\Campus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Campus controller.
 *
 * @Route("campus")
 */
class CampusController extends Controller
{
    /**
     * Lists all campus entities.
     *
     * @Route("/", name="campus_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $campuses = $em->getRepository('ImiecarBundle:Campus')->findAll();

        return $this->render('campus/index.html.twig', array(
            'campuses' => $campuses,
        ));
    }

    /**
     * Creates a new campus entity.
     *
     * @Route("/new", name="campus_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $campus = new Campus();
        $form = $this->createForm('ImiecarBundle\Form\CampusType', $campus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($campus);
            $em->flush($campus);

            return $this->redirectToRoute('campus_show', array('id' => $campus->getId()));
        }

        return $this->render('campus/new.html.twig', array(
            'campus' => $campus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a campus entity.
     *
     * @Route("/{id}", name="campus_show")
     * @Method("GET")
     */
    public function showAction(Campus $campus)
    {
        $deleteForm = $this->createDeleteForm($campus);

        return $this->render('campus/show.html.twig', array(
            'campus' => $campus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing campus entity.
     *
     * @Route("/{id}/edit", name="campus_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Campus $campus)
    {
        $deleteForm = $this->createDeleteForm($campus);
        $editForm = $this->createForm('ImiecarBundle\Form\CampusType', $campus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('campus_edit', array('id' => $campus->getId()));
        }

        return $this->render('campus/edit.html.twig', array(
            'campus' => $campus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a campus entity.
     *
     * @Route("/{id}", name="campus_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Campus $campus)
    {
        $form = $this->createDeleteForm($campus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($campus);
            $em->flush();
        }

        return $this->redirectToRoute('campus_index');
    }

    /**
     * Creates a form to delete a campus entity.
     *
     * @param Campus $campus The campus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Campus $campus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('campus_delete', array('id' => $campus->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
