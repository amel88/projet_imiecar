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
        return $this->render('ImiecarBundle::index.html.twig');
    }

    /**
    * @Route("/welcome", name="welcome")
    */
    public function welcomeAction()
    {
        return $this->render('@Imiecar/welcome.html.twig');
    }
}
