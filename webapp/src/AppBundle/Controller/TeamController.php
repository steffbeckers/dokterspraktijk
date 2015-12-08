<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TeamController extends Controller
{
    /**
     * @Route("/meettheteam")
     */
    public function showAction()
    {
        return $this->render('AppBundle:Team:show.html.twig', array(
            // ...
        ));
    }

}
