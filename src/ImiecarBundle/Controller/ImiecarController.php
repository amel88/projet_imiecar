<?php

namespace ImiecarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ImiecarController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('::base.html.twig');
    }


    /**
     * @Route("/creer",name="creer")
     */
    public function propositionTrajet()
    {
        return $this->render(':ville:show.html.twig');

    }

    /**
     * @Route("/mailjet")
     */
    public function test($name = "...")
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('christopher.jacquot@gmail.com')
            ->setTo('christopher.jacquot@gmail.com')
            ->setBody(
                $this->renderView(
                // app/Resources/views/Emails/registration.html.twig
                    'base.html.twig',
                    array('name' =>$name)
                ),
                'text/html'
            )
            /*
             * If you also want to include a plaintext version of the message
            ->addPart(
                $this->renderView(
                    'Emails/registration.txt.twig',
                    array('name' => $name)
                ),
                'text/plain'
            )
            */
        ;
        $this->get('mailer')->send($message);

        return $this->render("base.html.twig");

    }




}
