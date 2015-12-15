<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class HomeController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Home:index.html.twig', array(
            // ...
        ));
    }

    /**
    * @Route("/aanmelden", name="aanmelden")
    */
    public function loginAction()
    {
    	$securityContext = $this->container->get('security.context');
    	$router = $this->container->get('router');

    	if( $securityContext->isGranted('ROLE_USER')){
        	return $this->redirectToRoute('afspraak-maken');
    	} else 
    	{
    		return $this->render('AppBundle:Home:login.html.twig', array(
            // ...
        ));
    	}
    }

    /**
    * @Route("/registreren", name="registreren")
    */
     public function registerAction()
    {
        return $this->render('AppBundle:Home:register.html.twig', array(
            // ...
        ));
    }

}
