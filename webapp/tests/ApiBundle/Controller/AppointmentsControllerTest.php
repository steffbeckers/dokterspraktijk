<?php

namespace Tests\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AppointmentsControllerTest extends WebTestCase
{
	public function testApiReturnsJSON()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/api/appointments');
		$this->assertTrue($client->getResponse()->headers->contains(
        'Content-Type',
        'application/json'
    	)
		);
	}

	public function testApiReturnsCorrectId()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/api/appointments/1');

		$this->assertContains('"id":1', $client->getResponse()->getContent());
	}

	public function testApiReturnsOnlyDocterAppointments()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/api/doctors/1/appointments');

		$this->assertContains('"doctorid":1', $client->getResponse()->getContent());


	}

	public function testApiReturnsOnlyPatientAppointments()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/api/patients/2/appointments');

		$this->assertContains('"patientid":2', $client->getResponse()->getContent());

	}

	public function testApiGetOpenAppointments()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/api/appointments/open');

		$this->assertContains('"occupied":0', $client->getResponse()->getContent());
	}

	public function testApiGetOpenAppointmentsFromDocter()
	{
		$client = static::createClient();

		$crawler = $client->request('GET', '/api/doctors/1/appointments/open');

		$this->assertContains('start', $client->getResponse()->getContent());
	}


}