<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use JMS\Serializer\SerializationContext;

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

    /**
     * @Get("/appointments/open")
     */
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

    /**
     * @Get("/doctors/{id}/appointments/open")
     */
    public function getDoctorAppointmentsOpenAction($id)
    {
        $appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findBy(array('doctorid' => $id, 'occupied' => 0));

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
}