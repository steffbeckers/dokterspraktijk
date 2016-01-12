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
         $user = $this->getUser();
        return $this->render('Profile/updateUser.html.twig', array(
            'user' => $user,
        ));
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
