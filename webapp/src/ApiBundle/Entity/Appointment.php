<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appointment
 *
 * @ORM\Table(name="appointment")
 * @ORM\Entity
 */
class Appointment
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="docterId", type="integer", nullable=false)
     */
    private $docterid;

    /**
     * @var integer
     *
     * @ORM\Column(name="patientId", type="integer", nullable=true)
     */
    private $patientid;

    /**
     * @var string
     *
     * @ORM\Column(name="patientName", type="string", length=100, nullable=true)
     */
    private $patientname;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", length=65535, nullable=true)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDateTime", type="datetime", nullable=false)
     */
    private $startdatetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDateTime", type="datetime", nullable=false)
     */
    private $enddatetime;

    /**
     * @var string
     *
     * @ORM\Column(name="room", type="string", length=30, nullable=false)
     */
    private $room;

    /**
     * @var bool
     *
     * @ORM\Column(name="occupied", type="bool", nullable=false)
     */
    private $occupied;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Appointment
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set docterid
     *
     * @param integer $docterid
     *
     * @return Appointment
     */
    public function setDocterid($docterid)
    {
        $this->docterid = $docterid;

        return $this;
    }

    /**
     * Get docterid
     *
     * @return integer
     */
    public function getDocterid()
    {
        return $this->docterid;
    }

    /**
     * Set patientid
     *
     * @param integer $patientid
     *
     * @return Appointment
     */
    public function setPatientid($patientid)
    {
        $this->patientid = $patientid;

        return $this;
    }

    /**
     * Get patientid
     *
     * @return integer
     */
    public function getPatientid()
    {
        return $this->patientid;
    }

    /**
     * Set patientname
     *
     * @param string $patientname
     *
     * @return Appointment
     */
    public function setPatientname($patientname)
    {
        $this->patientname = $patientname;

        return $this;
    }

    /**
     * Get patientname
     *
     * @return string
     */
    public function getPatientname()
    {
        return $this->patientname;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Appointment
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set startdatetime
     *
     * @param \DateTime $startdatetime
     *
     * @return Appointment
     */
    public function setStartdatetime($startdatetime)
    {
        $this->startdatetime = $startdatetime;

        return $this;
    }

    /**
     * Get startdatetime
     *
     * @return \DateTime
     */
    public function getStartdatetime()
    {
        return $this->startdatetime;
    }

    /**
     * Set enddatetime
     *
     * @param \DateTime $enddatetime
     *
     * @return Appointment
     */
    public function setEnddatetime($enddatetime)
    {
        $this->enddatetime = $enddatetime;

        return $this;
    }

    /**
     * Get enddatetime
     *
     * @return \DateTime
     */
    public function getEnddatetime()
    {
        return $this->enddatetime;
    }

    /**
     * Set room
     *
     * @param string $room
     *
     * @return Appointment
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set occupied
     *
     * @param string $occupied
     *
     * @return Appointment
     */
    public function setOccupied($occupied)
    {
        $this->occupied = $occupied;

        return $this;
    }

    /**
     * Get occupied
     *
     * @return bool
     */
    public function getOccupied()
    {
        return $this->occupied;
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
}
