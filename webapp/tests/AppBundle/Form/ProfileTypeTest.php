<?php

namespace Tests\AppBundle\Form;

use AppBundle\Form\Type\ProfileType;
use Symfony\Component\Form\Test\TypeTestCase;

class TestedTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $foo = true;
    	$this->assertTrue($foo);
    }
}