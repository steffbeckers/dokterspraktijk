<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Appointment
 *
 * @ORM\Table(name="appointment")
 * @ORM\Entity
 *
 */
class Appointment
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="doctorId", type="integer", nullable=false)
     */
    private $doctorid;

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
     * @ORM\Column(name="start", type="datetime", nullable=false)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime", nullable=false)
     */
    private $end;

    /**
     * @var string
     *
     * @ORM\Column(name="room", type="string", length=30, nullable=false)
     */
    private $room;

    /**
     * @var bool
     *
     * @ORM\Column(name="occupied", type="integer", nullable=false)
     */
    private $occupied;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set doctorid
     *
     * @param integer $doctorid
     *
     * @return Appointment
     */
    public function setDoctorid($doctorid)
    {
        $this->doctorid = $doctorid;

        return $this;
    }

    /**
     * Get doctorid
     *
     * @return integer
     */
    public function getDoctorid()
    {
        return $this->doctorid;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Appointment
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Appointment
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set occupied
     *
     * @param int $occupied
     *
     * @return integer
     */
    public function setOccupied($occupied)
    {
        $this->occupied = $occupied;

        return $this;
    }

    /**
     * Get occupied
     *
     * @return integer
     */
    public function getOccupied()
    {
        return $this->occupied;
    }
}
