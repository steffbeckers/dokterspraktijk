<?php

namespace Tests\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class UsersControllerTest extends WebTestCase
{
	public function testApiReturnsJSON()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/api/users');
		$this->assertTrue($client->getResponse()->headers->contains(
        'Content-Type',
        'application/json'
    	)
		);
	}

	public function testApiReturnsCorrectUser()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/api/users/9');

		$this->assertContains('yannick', $client->getResponse()->getContent());
	}


}