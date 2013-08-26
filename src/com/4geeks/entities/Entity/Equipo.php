<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipo
 *
 * @ORM\Table(name="equipo", indexes={@ORM\Index(name="fk_equipo_socio_idx", columns={"socio_id"})})
 * @ORM\Entity(repositoryClass="Entity\EquipoRepository")
 */
class Equipo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="socio_id", type="integer")
     */
    private $socio_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="handicap_promedio", type="smallint")
     */
    private $handicap_promedio;

    /**
     * @var string
     *
     * @ORM\Column(name="createdate", type="string")
     */
    private $createdate;

    /**
     * @var string
     *
     * @ORM\Column(name="updatedate", type="string")
     */
    private $updatedate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entity\Asignacion", mappedBy="equipo")
     */
    private $asignacions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entity\Integrante", mappedBy="equipo")
     */
    private $integrantes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Entity\Reservacion", mappedBy="equipo")
     */
    private $reservacions;

    /**
     * @var \Entity\Socio
     *
     * @ORM\ManyToOne(targetEntity="Entity\Socio", inversedBy="equipos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="socio_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $socio;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->asignacions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->integrantes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reservacions = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set socio_id
     *
     * @param integer $socioId
     * @return Equipo
     */
    public function setSocioId($socioId)
    {
        $this->socio_id = $socioId;
    
        return $this;
    }

    /**
     * Get socio_id
     *
     * @return integer 
     */
    public function getSocioId()
    {
        return $this->socio_id;
    }

    /**
     * Set handicap_promedio
     *
     * @param integer $handicapPromedio
     * @return Equipo
     */
    public function setHandicapPromedio($handicapPromedio)
    {
        $this->handicap_promedio = $handicapPromedio;
    
        return $this;
    }

    /**
     * Get handicap_promedio
     *
     * @return integer 
     */
    public function getHandicapPromedio()
    {
        return $this->handicap_promedio;
    }

    /**
     * Set createdate
     *
     * @param string $createdate
     * @return Equipo
     */
    public function setCreatedate($createdate)
    {
        $this->createdate = $createdate;
    
        return $this;
    }

    /**
     * Get createdate
     *
     * @return string 
     */
    public function getCreatedate()
    {
        return $this->createdate;
    }

    /**
     * Set updatedate
     *
     * @param string $updatedate
     * @return Equipo
     */
    public function setUpdatedate($updatedate)
    {
        $this->updatedate = $updatedate;
    
        return $this;
    }

    /**
     * Get updatedate
     *
     * @return string 
     */
    public function getUpdatedate()
    {
        return $this->updatedate;
    }

    /**
     * Add asignacions
     *
     * @param \Entity\Asignacion $asignacions
     * @return Equipo
     */
    public function addAsignacion(\Entity\Asignacion $asignacions)
    {
        $this->asignacions[] = $asignacions;
    
        return $this;
    }

    /**
     * Remove asignacions
     *
     * @param \Entity\Asignacion $asignacions
     */
    public function removeAsignacion(\Entity\Asignacion $asignacions)
    {
        $this->asignacions->removeElement($asignacions);
    }

    /**
     * Get asignacions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAsignacions()
    {
        return $this->asignacions;
    }

    /**
     * Add integrantes
     *
     * @param \Entity\Integrante $integrantes
     * @return Equipo
     */
    public function addIntegrante(\Entity\Integrante $integrantes)
    {
        $this->integrantes[] = $integrantes;
    
        return $this;
    }

    /**
     * Remove integrantes
     *
     * @param \Entity\Integrante $integrantes
     */
    public function removeIntegrante(\Entity\Integrante $integrantes)
    {
        $this->integrantes->removeElement($integrantes);
    }

    /**
     * Get integrantes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIntegrantes()
    {
        return $this->integrantes;
    }

    /**
     * Add reservacions
     *
     * @param \Entity\Reservacion $reservacions
     * @return Equipo
     */
    public function addReservacion(\Entity\Reservacion $reservacions)
    {
        $this->reservacions[] = $reservacions;
    
        return $this;
    }

    /**
     * Remove reservacions
     *
     * @param \Entity\Reservacion $reservacions
     */
    public function removeReservacion(\Entity\Reservacion $reservacions)
    {
        $this->reservacions->removeElement($reservacions);
    }

    /**
     * Get reservacions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReservacions()
    {
        return $this->reservacions;
    }

    /**
     * Set socio
     *
     * @param \Entity\Socio $socio
     * @return Equipo
     */
    public function setSocio(\Entity\Socio $socio)
    {
        $this->socio = $socio;
    
        return $this;
    }

    /**
     * Get socio
     *
     * @return \Entity\Socio 
     */
    public function getSocio()
    {
        return $this->socio;
    }

}
