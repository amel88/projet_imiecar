<?php

namespace ImiecarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('ImiecarBundle:Default:index.html.twig');
    }


    /**
     * @Route("/arcana")
     */
    public function arcana()
    {
        return $this->render('@Imiecar/Default/arcana.html.twig');
    }


}
