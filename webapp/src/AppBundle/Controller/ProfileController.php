<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProfileController extends Controller
{
    /**
     * @Route("/showUser")
     */
    public function showUserAction()
    {
        $user = $this->getUser();
        return $this->render('Profile/showUser.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/profiel-aanpassen", name="Profielaanpassen")
     */
    public function updateUserAction()
    {
        $securityContext = $this->container->get('security.context');
        $user = $this->getUser();

        if( $securityContext->isGranted('ROLE_USER')){
            return $this->render('Profile/updateUser.html.twig', array(
                'user' => $user,));
        } else if ($securityContext->isGranted('ROLE_DOCTOR')) {
            return $this->render('Profile/updateDoctor.html.twig', array(
                'user' => $user,));
        } else {
            return $this->render('Home/login.html.twig');
        }

    }

    /**
     * @Route("/dokters")
     */
    public function showDoktersAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('Profile/showDoctors.html.twig', array('users' => $users));
    }

    /**
     * @Route("/afspraken")
     */
    public function showUserAppointmentsAction()
    {
        $id = $this->getUser()->getId();
        $appointments = $this->getDoctrine()->getRepository('AppBundle:Appointment')->findBy(array('patientid' => $id));
        return $this->render('Profile/showUserAppointments.html.twig', array('appointments' => $appointments));
    }


}
