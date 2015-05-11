<?php

namespace Crud\PersonaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comentario
 *
 * @ORM\Table(name="comentario", uniqueConstraints={@ORM\UniqueConstraint(name="id_video", columns={"id_video"})}, indexes={@ORM\Index(name="id_video_2", columns={"id_video"})})
 * @ORM\Entity
 */
class Comentario
{
    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=140, nullable=false)
     */
    private $comentario;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_comentario", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComentario;

    /**
     * @var \Crud\PersonaBundle\Entity\Video
     *
     * @ORM\ManyToOne(targetEntity="Crud\PersonaBundle\Entity\Video")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_video", referencedColumnName="id_video")
     * })
     */
    private $idVideo;


    function setIdComentario($idComentario) {
        $this->idComentario = $idComentario;
    }

        /**
     * Set comentario
     *
     * @param string $comentario
     * @return Comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * Get idComentario
     *
     * @return integer 
     */
    public function getIdComentario()
    {
        return $this->idComentario;
    }

    /**
     * Set idVideo
     *
     * @param \Crud\PersonaBundle\Entity\Video $idVideo
     * @return Comentario
     */
    public function setIdVideo(\Crud\PersonaBundle\Entity\Video $idVideo = null)
    {
        $this->idVideo = $idVideo;

        return $this;
    }

    /**
     * Get idVideo
     *
     * @return \Crud\PersonaBundle\Entity\Video 
     */
    public function getIdVideo()
    {
        return $this->idVideo;
    }
}
