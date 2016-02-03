<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function indexAction(Request $request)
    {
        $name = $request->request->get('naam');
        $email = $request->request->get('email');
        $sub = $request->request->get('sub');
        $body = $request->request->get('body');
        $data = "";

        $sub = $sub . " - Geen antwoord email";

        if($request->request->get('submit')){
            $message = \Swift_Message::newInstance()
                ->setSubject($sub)
                ->setFrom($email)
                ->setTo($this->getParameter('mailer_user'))
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        'Email/contact.html.twig',
                        array('name' => $name, 'email' => $email, 'body' => $body)
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            $data = "ok";
        }

        //Old
        return $this->render('Contact/index.html.twig', array(
            'data' => $data
        ));
    }

}
