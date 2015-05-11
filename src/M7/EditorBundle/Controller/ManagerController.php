<?php

namespace M7\EditorBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use M7\EditorBundle\Entity\Serializer;
use M7\EditorBundle\Entity\Doc;

/*s'ha d'afegir la classe DOC*/

class ManagerController extends Controller {

    public function homeAction() {
        return $this->render('M7EditorBundle::index.html.twig', array());
    }

    public function newDocAction(Request $request) {
        $doc = new Doc();
        $form = $this->createFormBuilder($doc)
                ->add('name', 'text')
                ->add('save', 'submit')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            Serializer::save($doc, $doc->getName());

            return $this->render('M7EditorBundle::index.html.twig', array());
        }

        return $this->render('M7EditorBundle:Manager:newDoc.html.twig', array("formulari" => $form->createView()
        ));
    }

    public function openDocAction($docname) {
/*En aquest mètode falta afegir codi*/
        $doc = Serializer::restore($docname);

        $form = $this->createFormBuilder($doc)
                ->add('content', 'textarea', array('attr' => array('rows' => '30', 'cols' => '140')))
                ->add('save', 'submit')
                ->getForm();

        return $this->render('M7EditorBundle:Manager:openDoc.html.twig', array("formulari" => $form->createView(), "name" => $doc->getName()
        ));
    }

    public function saveDocAction(Request $request) {
        $sms = "no s'ha pogut guardar. Ha hagut un error";

/*En aquest mètode falta afegir codi*/

        return $this->render('M7EditorBundle:Manager:saveDoc.html.twig', array(
                    "sms" => $sms
        ));
    }

    public function viewDocAction($docname) {

        $doc = Serializer::restore($docname);

        $name = $doc->getName();
        $html = $this->transformDoc($doc->getContent());

        return $this->render('M7EditorBundle:Manager:viewDoc.html.twig', array(
                    "name" => $name, "content" => $html
        ));
    }

    public function listDocsAction($type) {

        $listado = Serializer::showIds();
        
        return $this->render('M7EditorBundle:Manager:listDoc.html.twig', array(
            'target_link'=>$type, 'lista'=>$listado
                    
        ));
    }

    private function transformDoc($content) {
        /*En aquest mètode falta afegir codi*/
        return $content;
    }

}
