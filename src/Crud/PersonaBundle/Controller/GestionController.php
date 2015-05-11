<?php

namespace Crud\PersonaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crud\PersonaBundle\Entity\Video;
use Crud\PersonaBundle\Entity\Comentario;
use Symfony\Component\HttpFoundation\Request;

class GestionController extends Controller {

    public function crearAction(Request $request) {
        $video = new Video();
        $form = $this->createFormBuilder($video)
                ->add('nombre', 'text')
                ->add('descripcion', 'text')
                ->add('url', 'file')
                ->add('save', 'submit')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            //guardar en BD $per
            //doctrine  

            $em = $this->getDoctrine()->getManager();
            if (!($em->getRepository('CrudPersonaBundle:Video')->find($video->getNombre()) instanceof Video)) {
                $em->persist($video);
                $em->flush();
                $form['url']->getData()->move('./bundles/crudpersona/images', $video->getNombre());
                return $this->render('CrudPersonaBundle::home.html.twig', array('mensage' => 'Video Creada'));
            } else {
                return $this->render('CrudPersonaBundle::home.html.twig', array('mensage' => 'Video ya existe'));
            }



            //Serializer::save($per, $per->getDni());
        }

        return $this->render('CrudPersonaBundle:Gestion:crear.html.twig', array('formulario' => $form->createView()));
    }

    public function modPersonaAction(Request $request, $id_video) {

        $em = $this->getDoctrine()->getManager();
        $per = $em->getRepository('CrudPersonaBundle:Video')->find($id_video);
        //$per = Serializer::restore($dni);

        if ($per instanceof Video) {

            $form = $this->createFormBuilder($per)
                    ->add('descripcion', 'text')
                    ->add('save', 'submit')
                    ->getForm();

            $form->handleRequest($request);
            if ($form->isValid()) {
                //guardar en BD $per
                //doctrine  

                $em->flush();
                //Serializer::save($per, $per->getDni());

                return $this->render('CrudPersonaBundle::home.html.twig', array('mensage' => 'Video Modificada'));
            }

            return $this->render('CrudPersonaBundle:Gestion:crear.html.twig', array('formulario' => $form->createView()));
        }

        return $this->render('CrudPersonaBundle::home.html.twig', array('mensage' => 'Error Video no encontrada.'));
    }

    public function leerAction($id_video, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository('CrudPersonaBundle:Video')->find($id_video);
        $comentario=new Comentario();
        
        $form = $this->createFormBuilder($p)
                ->add('puntos', 'choice', array(
                    'choices'=>array(                  
                    '0' =>'0','1' =>'1','2' =>'2','3' =>'3')))
                ->add('save', 'submit')
                ->getForm();
          $form->handleRequest($request);
          
          $form2 = $this->createFormBuilder($comentario)
                ->add('comentario','text')
                ->add('save', 'submit')
                ->getForm();
                
        
        $form2->handleRequest($request);
        
        
        if ($p instanceof Video) {
            if ($form->isValid()) {
                $p->setNumValoraciones($p->getNumValoraciones() + 1);
                  $p->setTotalPuntos($p->getTotalPuntos() + $p->getPuntos());
                          
            $em->flush();
                if ($form2->isValid()) {
               $comentario->setIdVideo($id_video);
                           $em->flush();
                }
                return $this->render('CrudPersonaBundle:Gestion:leer.html.twig', array(
                            'persona' => $p, 'formulario' => $form->createView(),'formulario2' => $form2->createView()
            ));}
            
            return $this->render('CrudPersonaBundle:Gestion:leer.html.twig', array(
                        'persona' => $p, 'formulario' => $form->createView(),'formulario2' => $form2->createView()
            ));
        }
        return $this->render('CrudPersonaBundle::home.html.twig', array('mensage' => 'Error Video no encontrada.'));
    }

    public function listarPersonasAction() {
        $em = $this->getDoctrine()->getManager();
        $lista = $em->getRepository('CrudPersonaBundle:Video')->findAll();

        return $this->render('CrudPersonaBundle:Gestion:listado.html.twig', array(
                    'lista' => $lista
        ));
    }

    public function modificarAction() {

        $em = $this->getDoctrine()->getManager();
        $listado = $em->getRepository('CrudPersonaBundle:Video')->findAll();

        return $this->render('CrudPersonaBundle:Gestion:modificar.html.twig', array(
                    'lista' => $listado
        ));
    }

    public function eliminarAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $video = new Video();
        $form = $this->createFormBuilder($video)
                ->add('idVideo', 'text')
                ->add('delete', 'submit')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $video = $em->getRepository('CrudPersonaBundle:Video')->find($video->getIdVideo());
            if ($video instanceof Video) {
                $em->remove($video);
                $em->flush();
                return $this->render('CrudPersonaBundle::home.html.twig', array('mensage' => 'Video Borrada.'));
            } else {
                return $this->render('CrudPersonaBundle::home.html.twig', array('mensage' => 'No se encuentra el Video'));
            }
        }
        return $this->render('CrudPersonaBundle:Gestion:eliminar.html.twig', array('formulario' => $form->createView()));
    }

}
