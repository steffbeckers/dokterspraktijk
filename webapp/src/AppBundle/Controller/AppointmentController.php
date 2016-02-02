<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AppointmentController extends Controller
{
    /**
     * @Route("/afspraak-maken", name="afspraak-maken")
     */
    public function showCalendarAction()
    {
        $securityContext = $this->container->get('security.context');
        $router = $this->container->get('router');

        if( $securityContext->isGranted('ROLE_USER')){
            return $this->render('Afspraak/showCalendar.html.twig');
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
}
