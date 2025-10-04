<?php

use PHPUnit\Framework\TestCase;
use yii\base\Security;

class UserTest extends TestCase
{
    public function testPasswordValidation()
    {
        $security = new Security();

        $hash = $security->generatePasswordHash('mypassword');

        $this->assertTrue($security->validatePassword('mypassword', $hash));
        $this->assertFalse($security->validatePassword('wrongpassword', $hash));
    }
}
