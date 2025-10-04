<?php
use PHPUnit\Framework\TestCase;
use yii\base\Security;

class LoginTest extends TestCase
{
    public function testLoginSuccess()
    {
        $security = new Security();
        $hash = $security->generatePasswordHash('password123');

        $this->assertTrue($security->validatePassword('password123', $hash));
    }

    public function testLoginFail()
    {
        $security = new Security();
        $hash = $security->generatePasswordHash('password123');

        $this->assertFalse($security->validatePassword('wrongpass', $hash));
    }
}
