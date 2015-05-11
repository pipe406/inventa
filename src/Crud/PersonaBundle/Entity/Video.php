<?php

namespace Crud\PersonaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity
 */
class Video
{
    /**function setIdVideo($idVideo) {
$this->idVideo = $idVideo;
}


     * @var integer
     *
     * @ORM\Column(name="totalPuntos", type="integer", nullable=true)
     */
    private $totalpuntos;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=30, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=140, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntos", type="integer", nullable=true)
     */
    private $puntos;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_valoraciones", type="integer", nullable=true)
     */
    private $numValoraciones;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=50, nullable=false)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_video", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVideo;



    /**
     * Set totalpuntos
     *
     * @param integer $totalpuntos
     * @return Video
     */
    public function setTotalpuntos($totalpuntos)
    {
        $this->totalpuntos = $totalpuntos;

        return $this;
    }

    /**
     * Get totalpuntos
     *
     * @return integer 
     */
    public function getTotalpuntos()
    {
        return $this->totalpuntos;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Video
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Video
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set puntos
     *
     * @param integer $puntos
     * @return Video
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get puntos
     *
     * @return integer 
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set numValoraciones
     *
     * @param integer $numValoraciones
     * @return Video
     */
    public function setNumValoraciones($numValoraciones)
    {
        $this->numValoraciones = $numValoraciones;

        return $this;
    }

    /**
     * Get numValoraciones
     *
     * @return integer 
     */
    public function getNumValoraciones()
    {
        return $this->numValoraciones;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get idVideo
     *
     * @return integer 
     */
    public function getIdVideo()
    {
        return $this->idVideo;
    }
}
