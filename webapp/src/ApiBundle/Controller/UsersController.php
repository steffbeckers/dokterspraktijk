<?php

namespace ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use JMS\Serializer\SerializationContext;

class UsersController extends FOSRestController
{
    public function getUsersAction()
    {
        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        if (false === $users) {
            throw $this->createNotFoundException("No users found.");
        }

        $view = $this->view($users, 200);
        return $this->handleView($view);
    }

    public function getUsersDoctorsAction()
    {
        $query = $this->getDoctrine()->getEntityManager()
            ->createQuery('SELECT u FROM AppBundle:User u WHERE u.roles LIKE :role')
            ->setParameter('role', '%"ROLE_DOCTOR"%');

        $doctors = $query->getResult();

        if (false === $doctors) {
            throw $this->createNotFoundException("No found.");
        }

        $view = $this->view($doctors, 200);
        //$view->setSerializationContext(SerializationContext::create()->setGroups(array('doctorList')));
        return $this->handleView($view);
    }

    public function getUsersUsersAction()
    {
        $query = $this->getDoctrine()->getEntityManager()
            ->createQuery('SELECT u FROM AppBundle:User u WHERE u.roles LIKE :role')
            ->setParameter('role', '%"ROLE_USER"%');

        $endusers = $query->getResult();

        if (false === $endusers) {
            throw $this->createNotFoundException("No found.");
        }

        $view = $this->view($endusers, 200);
        return $this->handleView($view);
    }

    public function getUserAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);

        if (false === $user) {
            throw $this->createNotFoundException("User not found.");
        }

        $view = $this->view($user, 200);
        return $this->handleView($view);
    }


}