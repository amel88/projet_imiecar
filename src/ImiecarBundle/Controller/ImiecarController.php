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
        return $this->render('base.html.twig');
    }

//    /**
//     * @Route("/arcana",name="arcana")
//     */
//    public function arcana()
//    {
//        return $this->render('base.html.twig');
//
//    }

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
        return $this->render('ville/index.html.twig');

    }
}
