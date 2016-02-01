<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AdminControllerTest extends WebTestCase
{
	public function testNoLoginNoAdmin()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/admin');

		$this->assertEquals($client->getResponse()->getStatusCode(), "301");
	}

	public function testUserNotAdmin()
	{
		$client = static::createClient(array(), array(
		    'PHP_AUTH_USER' => 'yannick',
		    'PHP_AUTH_PW'   => '123456',
		));

		$crawler = $client->request('GET','/admin');

		$this->assertEquals($client->getResponse()->getStatusCode(), "301");
	}

	public function testUserIsAdmin()
	{
		$client = static::createClient(array(), array(
		    'PHP_AUTH_USER' => 'admin',
		    'PHP_AUTH_PW'   => 'admin',
		));

		$crawler = $client->request('GET','/admin');

		$this->assertTrue($client->getResponse()->isRedirect());
	}
}