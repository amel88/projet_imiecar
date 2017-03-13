<?php

namespace ImiecarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
	/**
	 * @Route("/admin/", name="homeAdmin")
	 */
    public function indexAction()
    {
        return $this->render('@Imiecar/admin/base.admin.html.twig.');
    }


    /**
     * @Route("/arcana")
     */
    public function arcana()
    {
        return $this->render('@Imiecar/Default/arcana.html.twig');

    }
    
}
