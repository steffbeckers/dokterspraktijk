<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AfspraakControllerTest extends WebTestCase
{
    public function testShowcalendar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afspraak');
    }

}
