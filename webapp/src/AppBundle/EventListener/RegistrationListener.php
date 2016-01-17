<?php
/**
 * Created by PhpStorm.
 * User: Steven
 * Date: 12/01/16
 * Time: 13:52
 */

namespace AppBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;

class RegistrationListener implements EventSubscriberInterface
{

    private $router;
    private $mailer;
    private $container;
    private $twig;

    public function __construct(UrlGeneratorInterface $router, \Swift_Mailer $mailer, ContainerInterface $container, \Twig_Environment $twig)
    {
        $this->router = $router;
        $this->mailer = $mailer;
        $this->container = $container;
        $this->templating = $twig;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS =>'onRegSucces',
            FOSUserEvents::REGISTRATION_COMPLETED =>'onRegCompleted',
            /*FOSUserEvents::REGISTRATION_CONFIRMED =>'onRegComfirmed',
            FOSUserEvents::REGISTRATION_CONFIRM =>'onRegComfirm',*/
        );
    }

    public function onRegSucces(FormEvent $event)
    {
        $url = $this->router->generate('homepage');

        $event->setResponse(new RedirectResponse($url));
    }

    public function onRegCompleted(FilterUserResponseEvent $event)
    {
        $user = $event->getUser();
        $userMail = $user->getEmail();

        $message = \Swift_Message::newInstance()
            ->setSubject('Registratie compleet - DoktersPraktijk')
            ->setFrom('praktijkdokter@gmail.com')
            ->setTo($userMail)
            ->setBody($this->container->get('templating')->renderResponse(
                        'Email/registration.html.twig',
                        array(
                            'user' => $user
                        )
                )
            , 'text/html');

        $this->mailer->send($message);
    }

}