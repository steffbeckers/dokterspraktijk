<?php

// src/Appbundle/EventListener/ChangePasswordSucces.php

namespace AppBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ChangePasswordSucces implements EventSubscriberInterface
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::CHANGE_PASSWORD_SUCCESS =>'onChangePassword',
        );
    }

    public function onChangePassword(FormEvent $event)
    {
        
        $url = $this->router->generate('Profielaanpassen');

        $event->setResponse(new RedirectResponse($url));
    }
}