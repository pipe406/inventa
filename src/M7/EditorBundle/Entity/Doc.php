<?php
namespace  M7\EditorBundle\Entity;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Doc
 *
 * @author ANDRES ZAPATA
 */
class Doc {
   
   private $name;
  private $content;
    
    public function getName() {
        return $this->name;
    }

    public function getContent() {
        return $this->content;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setContent($content) {
        $this->content = $content;
    }



//put your code here
}
