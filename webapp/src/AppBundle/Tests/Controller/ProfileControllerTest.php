<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfileControllerTest extends WebTestCase
{
    public function testShowuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showUser');
    }

    public function testUpdateuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/updateUser');
    }

    public function testDeleteuser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/deleteUser');
    }

    public function testAdduser()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/addUser');
    }

}
