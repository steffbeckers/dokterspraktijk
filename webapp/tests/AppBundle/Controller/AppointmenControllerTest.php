<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AppointmentControllerTest extends WebTestCase
{
	public function testRedirectWhenNotLoggedIn()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/afspraak-maken');

		$this->assertTrue($client->getResponse()->isRedirect());
	}
}