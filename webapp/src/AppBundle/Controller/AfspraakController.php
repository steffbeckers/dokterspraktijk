<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AfspraakController extends Controller
{
    /**
     * @Route("/afspraak")
     */
    public function showCalendarAction()
    {
        return $this->render('AppBundle:Afspraak:showCalendar.html.twig', array(
            // ...
        ));
    }

}
