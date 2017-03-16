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
     * @Route("/admin")
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }


    /**
     * @Route("/contact",name="contact")
     */
    public function contact()
    {
        return $this->render('@Imiecar/Default/contact.html.twig');

    }

    /**
     * @Route("/creer",name="creer")
     */
    public function propositionTrajet()
    {
        return $this->render(':ville:show.html.twig');

    }
}
