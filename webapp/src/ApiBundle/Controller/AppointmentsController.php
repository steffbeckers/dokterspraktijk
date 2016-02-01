<?php

namespace ApiBundle\Controller;

use AppBundle\Entity\Appointment;
use AppBundle\Form\AppointmentType;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use JMS\Serializer\SerializationContext;
use DateTime;

class AppointmentsController extends FOSRestController
{
    public function getAppointmentsAction()
    {
        $appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findAll();

        if (false === $appointments) {
            throw $this->createNotFoundException("No appointments found.");
        }

        $view = $this->view($appointments, 200);
        return $this->handleView($view);
    }


    public function getAppointmentsOpenAction()
    {
        $appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findBy(array('occupied' => 0));

        if (false === $appointments) {
            throw $this->createNotFoundException("No appointments found.");
        }

        $view = $this->view($appointments, 200);
        return $this->handleView($view);
    }

    public function getAppointmentAction($id)
    {
        $appointment = $this->getDoctrine()->getRepository('AppBundle:Appointment')->find($id);

        if (false === $appointment) {
            throw $this->createNotFoundException("Appointment not found.");
        }

        $view = $this->view($appointment, 200);
        return $this->handleView($view);
    }

    public function getDoctorAppointmentsOpenAction($id)
    {
        //$appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findBy(array('doctorid' => $id, 'occupied' => 0));

        $query = $this->getDoctrine()->getEntityManager()
            ->createQuery('SELECT a FROM AppBundle:Appointment a WHERE a.doctorid = :docId AND a.occupied = :occupied AND a.start >= :dateNow')
            ->setParameter('docId', $id)
            ->setParameter('occupied', 0)
            ->setParameter('dateNow', date("Y-m-d H:i:s"));

        $appointments = $query->getResult();

        if (false === $appointments) {
            throw $this->createNotFoundException("Appointments not found.");
        }

        $view = $this->view($appointments, 200);
        $view->setSerializationContext(SerializationContext::create()->setGroups(array('appointmentsList')));
        return $this->handleView($view);
    }

    public function getDoctorAppointmentsAction($id)
    {
        $appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findBy(array('doctorid' => $id));

        if (false === $appointments) {
            throw $this->createNotFoundException("Appointments not found.");
        }

        $view = $this->view($appointments, 200);
        return $this->handleView($view);
    }

    public function getPatientAppointmentsAction($id)
    {
        $appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findBy(array('patientid' => $id));

        if (false === $appointments) {
            throw $this->createNotFoundException("Appointments not found.");
        }

        $view = $this->view($appointments, 200);
        return $this->handleView($view);
    }

    /**
     * @Post("/appointments/{id}")
     */
    public function postAppointmentUpdateAction(Request $request, $id)
    {
        $data = json_decode($request->getContent(), true);

        $appointment = $this->getDoctrine()->getRepository('AppBundle:Appointment')->find($id);

        $appointment->setPatientid($data['patientId']);
        $appointment->setPatientname($data['patientName']);
        $appointment->setMessage($data['patientMessage']);
        $appointment->setOccupied(1);

        $em = $this->getDoctrine()->getManager();
        $em->persist($appointment);
        $em->flush();

        $view = $this->view($appointment, 202);
        return $this->handleView($view);
    }

    public function postAppointmentAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        $appointment = new Appointment();
        $appointment->setTitle(null);
        $appointment->setDoctorid($data['doctorId']);
        $appointment->setPatientid(null);
        $appointment->setPatientname(null);
        $appointment->setMessage(null);
        $appointment->setRoom($data['room']);
        $appointment->setStart(new \DateTime($data['start']));
        $appointment->setEnd(new \DateTime($data['end']));
        $appointment->setOccupied(0);

        $em = $this->getDoctrine()->getManager();
        $em->persist($appointment);
        $em->flush();

        $view = $this->view($appointment, 201);
        return $this->handleView($view);
    }

    /**
     * @Delete("/appointments/{id}")
     */
    public function deleteAppointmentAction($id)
    {
        $appointment = $this->getDoctrine()->getRepository('AppBundle:Appointment')->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($appointment);
        $em->flush();

        $view = $this->view($appointment, 202);
        return $this->handleView($view);
    }

}