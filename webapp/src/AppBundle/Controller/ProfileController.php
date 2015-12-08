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
        return $this->render('AppBundle:Profile:showUser.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/updateUser")
     */
    public function updateUserAction()
    {
        return $this->render('AppBundle:Profile:updateUser.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/deleteUser")
     */
    public function deleteUserAction()
    {
        return $this->render('AppBundle:Profile:deleteUser.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/addUser")
     */
    public function addUserAction()
    {
        return $this->render('AppBundle:Profile:addUser.html.twig', array(
            // ...
        ));
    }

}
