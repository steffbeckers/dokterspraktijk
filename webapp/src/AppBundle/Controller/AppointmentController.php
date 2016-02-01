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
            return $this->render('Profile/showDoctors.html.twig');
        }
        
    }

    /**
     * @Route("/afspraken-beheren", name="afspraak-beheren")
     */
    public function editCalendarAction()
    {
        $securityContext = $this->container->get('security.context');
        $router = $this->container->get('router');

        if( $securityContext->isGranted('ROLE_DOCTOR')){
            return $this->render('Afspraak/editCalendar.html.twig');
        } else
        {
            return $this->render('Home/index.html.twig');
        }

    }

}
