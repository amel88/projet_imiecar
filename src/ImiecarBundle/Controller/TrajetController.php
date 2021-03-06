<?php

namespace ImiecarBundle\Controller;

use ImiecarBundle\Entity\Trajet;
use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Trajet controller.
 *
 * @Route("trajet")
 */
class TrajetController extends Controller
{
    /**
     * Lists all trajet entities.
     *
     * @Route("/", name="trajet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $trajets = $em->getRepository('ImiecarBundle:Trajet')->findall();

        return $this->render('trajet/index.html.twig', array(
            'trajets' => $trajets,
        ));
    }

    /**
     * Choisir un trajet.
     *
     * @Route("/choisir", name="choix_trajet")
     * @Method({"GET", "POST"})
     */
    public function listeTrajetsChoisis(Request $request)
    {

        $trajet = new Trajet();
        $form = $this->createForm('ImiecarBundle\Form\ChoixTrajetType', $trajet);
        $form->handleRequest($request);

            $em = $this->getDoctrine()->getManager();
        if ($form->isSubmitted() && $form->isValid()) {
            $trajets = $em->getRepository('ImiecarBundle:Trajet')->findSearch($trajet);


            return $this->render('choix/index.html.twig', array(
                'trajets' => $trajets,
                'form' => $form->createView(),
            ));
        }
        $trajets = [];
        return $this->render('choix/index.html.twig', array(
            'trajets' => $trajets,
            'form' => $form->createView(),
        ));

    }
    /**
     * Finds and displays a trajet entity.
     *
     * @Route("/choisir/{id}", name="choix_show")
     * @Method("GET")
     */

   public function showAction1(Request $request,Trajet $trajet)
    {
        $deleteForm = $this->createDeleteForm($trajet);

        return $this->render('choix/show.html.twig', array(
            'trajet' => $trajet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a trajet entity.
     *
     * @Route("/choisir/miseajour/{id}", name="choix_miseajour")
     * @Method("GET")
     */

    public function choixAJour( Trajet $trajet)
    {

        dump($trajet);

       $deleteForm = $this->createDeleteForm($trajet);
        $em = $this->getDoctrine()->getManager();

            $trajet->setNbPlaces($trajet->getNbPlaces()-1);
            $em->flush();

        //ajout
        $message = \Swift_Message::newInstance()
            ->setSubject('confirmation du trajet')
            ->setFrom('christopher.jacquot@gmail.com')
//                    $this->getUser()->getEmail())
            ->setTo('christopher.jacquot@gmail.com')
            ->setBody(
                ' Bonjour '.
                $this->getUser().', je vous confirme le choix de votre trajet du '.
                $trajet->getDate()->format('d.m.y').'. Il a comme ville de départ : "'.
                $trajet->getVilleDepart(). '" , heure de départ : ' .
                $trajet->getHeureDepart()->format('h:m') .' arrive à sa destination qui est : "'.
                $trajet->getVilleArrivee().'" vers '.
                $trajet->getHeureArrivee()->format('h:m').' .'
            );


        $this->get('mailer')->send($message);

        //fin ajout

        return $this->render('choix/validation.html.twig', array(
            'trajet' => $trajet,
            'delete_form' => $deleteForm->createView(),

        ));

    }

    /**
     * Creates a new trajet entity.
     *
     * @Route("/new", name="trajet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $trajet = new Trajet();
        $form = $this->createForm('ImiecarBundle\Form\TrajetType', $trajet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trajet->setIdUtilisateur($this->get('security.token_storage')->getToken()->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($trajet);
            $em->flush();

            //ajout
            $message = \Swift_Message::newInstance()
                ->setSubject('confirmation du trajet')
                ->setFrom('christopher.jacquot@gmail.com')
//                    $this->getUser()->getEmail())
                ->setTo('christopher.jacquot@gmail.com')
                ->setBody(
                 ' Bonjour '.
                 $this->getUser().', votre trajet du '.
                 $trajet->getDate()->format('d.m.y').' à bien été pris en compte. Il a comme ville de départ : "'.
                 $trajet->getVilleDepart(). '" , heure de départ : ' .
                 $trajet->getHeureDepart()->format('h:m') .' arrive à sa destination qui est : "'.
                 $trajet->getVilleArrivee().'" vers '.
                 $trajet->getHeureArrivee()->format('h:m').' .'
                );


            $this->get('mailer')->send($message);

            //fin ajout

            return $this->redirectToRoute('trajet_show', array('id' => $trajet->getId()));


        }


        return $this->render('trajet/new.html.twig', array(
            'trajet' => $trajet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a trajet entity.
     *
     * @Route("/{id}", name="trajet_show")
     * @Method("GET")
     */
    public function showAction(Trajet $trajet)
    {
        $deleteForm = $this->createDeleteForm($trajet);

        return $this->render('trajet/show.html.twig', array(
            'trajet' => $trajet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing trajet entity.
     *
     * @Route("/{id}/edit", name="trajet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Trajet $trajet)
    {
        $deleteForm = $this->createDeleteForm($trajet);
        $editForm = $this->createForm('ImiecarBundle\Form\TrajetType', $trajet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('trajet_edit', array('id' => $trajet->getId()));
        }

        return $this->render('trajet/edit.html.twig', array(
            'trajet' => $trajet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a trajet entity.
     *
     * @Route("/{id}", name="trajet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Trajet $trajet)
    {
        $form = $this->createDeleteForm($trajet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($trajet);
            $em->flush();
        }

        return $this->redirectToRoute('trajet_index');
    }

    /**
     * Creates a form to delete a trajet entity.
     *
     * @param Trajet $trajet The trajet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Trajet $trajet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trajet_delete', array('id' => $trajet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}