<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AfspraakController extends Controller
{
    /**
     * @Route("/afspraak-maken", name="afspraak-maken")
     */
    public function showCalendarAction()
    {
    	$securityContext = $this->container->get('security.context');
    	$router = $this->container->get('router');

    	if( $securityContext->isGranted('ROLE_USER')){
        	return $this->render('AppBundle:Afspraak:showCalendar.html.twig');
    	} else 
    	{
    		return $this->render('AppBundle:Home:login.html.twig');
    	}
    	
    }

}
