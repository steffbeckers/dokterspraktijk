<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DokterController extends Controller
{
    /**
     * @Route("/dokters", name="dokters")
     */
    public function indexAction()
    {
        return $this->render('Dokter/index.html.twig', array(
            // ...
        ));
    }

}
