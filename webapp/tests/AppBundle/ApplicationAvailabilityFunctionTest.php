<?php

// tests/AppBundle/ApplicationAvailabilityFunctionalTest.php
namespace Tests\AppBundle;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApplicationAvailabilityFunctionalTest extends WebTestCase
{
    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessfulNotLoggedIn($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        return array(
            array('/'),
            array('/afspraak-maken'),
            array('/contact'),
            array('/aanmelden'),
            array('/meettheteam'),
            array('/login'),
        );
    }

    /**
    * @dataProvider urlLoginProvider
    */
    public function testPageIsSuccessfulLoggedInUser($url)
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'yannick',
            'PHP_AUTH_PW'   => '123456',
        ));

        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlLoginProvider()
    {
        return array(
            array('/'),
            array('/afspraak-maken'),
            array('/profiel-aanpassen'),
        );
    }

    public function testPageIsSuccessfulLoggedInAdmin()
    {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'admin',
        ));

        $client->request('GET', "/admin");

        $this->assertTrue($client->getResponse()->isRedirect());
    }


}