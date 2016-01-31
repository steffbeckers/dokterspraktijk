<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AppointmentControllerTest extends WebTestCase
{
	public function testDontGetAfspraken()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/afspraak-maken');

		$this->assertContains('aanmelden', $client->getResponse()->getContent());
	}

	public function testUserGetsAfspraken()
	{
		$client = static::createClient(array(), array(
	    	'PHP_AUTH_USER' => 'yannick',
	    	'PHP_AUTH_PW'   => '123456',
		));
		
		$client->request('GET','afspraak-maken');
		$this->assertContains('afspraak', $client->getResponse()->getContent());
	}



}