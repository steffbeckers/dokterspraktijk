<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class UsersController extends FOSRestController
{
    public function getUserAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        //var_dump($user);
        if (false === $user) {
            throw $this->createNotFoundException("User not found.");
        }

        $view = $this->view($user, 200);
        return $this->handleView($view);
    } // "get_user"   [GET] /users/{slug}
}