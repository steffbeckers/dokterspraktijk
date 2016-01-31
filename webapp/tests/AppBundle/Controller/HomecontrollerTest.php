<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class HomeControllerTest extends WebTestCase
{
	public function testGetHome()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/');

		$this->assertContains('Welkom', $client->getResponse()->getContent());
	}
}