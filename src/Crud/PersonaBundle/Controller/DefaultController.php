<?php

namespace Crud\PersonaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CrudPersonaBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function homeAction()
    {
        return $this->render('CrudPersonaBundle::home.html.twig', array());
    }    
}
