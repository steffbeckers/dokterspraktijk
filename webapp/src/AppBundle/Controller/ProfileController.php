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
     * @Route("/deleteUser")
     */
    public function deleteUserAction()
    {
        return $this->render('Profile/deleteUser.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/addUser")
     */
    public function addUserAction()
    {
        return $this->render('Profile/addUser.html.twig', array(
            // ...
        ));
    }
}
