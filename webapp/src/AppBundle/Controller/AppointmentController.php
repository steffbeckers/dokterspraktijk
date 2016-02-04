<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AppointmentController extends Controller
{
    /**
     * @Route("/afspraak-maken", name="afspraak-maken")
     */
    public function showAction()
    {
        $securityContext = $this->container->get('security.context');
        $router = $this->container->get('router');

        if( $securityContext->isGranted('ROLE_USER')){

            $em = $this->getDoctrine()->getManager();
            $rooms = $em->getRepository('AppBundle:Room')->findAll();
            $id = $this->getUser()->getId();
            $appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findBy(array('patientid' => $id));

            //Laad 1 pagina waar 2 paginas in zitten

            if ($this->isMobile()){
                //Mobile laad een pagina waar dan de apointments ingeladen worden
                return $this->render('Afspraak/showApointments.html.twig', array('appointments' => $appointments));
            } else {
                //Gewoon laad een pagina waar dan alles ingeladen wordt
                return $this->render('Afspraak/showCalendar.html.twig', array('rooms' => $rooms, 'appointments' => $appointments));
            }
        } else
        {
            $userManager = $this->get('fos_user.user_manager');
            $users = $userManager->findUsers();
            return $this->render('Profile/showDoctors.html.twig', array('users' => $users));
        }

    }

    /**
     * @Route("/afspraak-overzicht", name="afspraak-overzicht")
     */
    public function showAppointmentsAction()
    {
        $securityContext = $this->container->get('security.context');

        if( $securityContext->isGranted('ROLE_USER')){

            $id = $this->getUser()->getId();
            $appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findBy(array('patientid' => $id));

            //Gewoon laad een pagina waar dan alles ingeladen wordt
            return $this->render('Afspraak/showApointments.html.twig', array('appointments' => $appointments));

        } else
        {
            $userManager = $this->get('fos_user.user_manager');
            $users = $userManager->findUsers();
            return $this->render('Profile/showDoctors.html.twig', array('users' => $users));
        }

    }

    /**
     * @Route("/afspraak-cal", name="afspraak-cal")
     */
    public function showCalendarAction()
    {
        $securityContext = $this->container->get('security.context');
        $router = $this->container->get('router');

        if( $securityContext->isGranted('ROLE_USER')){

            $em = $this->getDoctrine()->getManager();
            $rooms = $em->getRepository('AppBundle:Room')->findAll();
            $id = $this->getUser()->getId();
            $appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findBy(array('patientid' => $id));

            //Gewoon laad een pagina waar dan alles ingeladen wordt
            return $this->render('Afspraak/showCalendar.html.twig', array('rooms' => $rooms, 'appointments' => $appointments));

        } else
        {
            $userManager = $this->get('fos_user.user_manager');
            $users = $userManager->findUsers();
            return $this->render('Profile/showDoctors.html.twig', array('users' => $users));
        }

    }

    /**
     * @Route("/afspraken-beheren", name="afspraken-beheren")
     */
    public function editCalendarAction()
    {
        $securityContext = $this->container->get('security.context');
        $router = $this->container->get('router');

        if ($securityContext->isGranted('ROLE_DOCTOR')) {
            $em = $this->getDoctrine()->getManager();
            $rooms = $em->getRepository('AppBundle:Room')->findAll();
            return $this->render('Afspraak/editCalendar.html.twig', array('rooms' => $rooms));
        } else {
            $userManager = $this->get('fos_user.user_manager');
            $users = $userManager->findUsers();

            return $this->render('Profile/showDoctors.html.twig', array('users' => $users));
        }

    }

    /**
     * @Route("/agenda", name="agenda")
     */
    public function calendarAction()
    {
        $securityContext = $this->container->get('security.context');
        $router = $this->container->get('router');

        if ($securityContext->isGranted('ROLE_DOCTOR')) {
            return $this->render('Afspraak/calendar.html.twig');
        } else {
            $userManager = $this->get('fos_user.user_manager');
            $users = $userManager->findUsers();

            return $this->render('Profile/showDoctors.html.twig', array('users' => $users));
        }

    }

    function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }
}
