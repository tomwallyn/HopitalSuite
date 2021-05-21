<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AppTest extends WebTestCase {

    public function testLoginPageUserNotConnect() {
        $client = static::createClient();
        $client -> request('GET', '/');
        $this -> assertResponseStatusCodeSame(Response::HTTP_OK);
    }

    public function testAccueilPageUserNotConnectRedirect() {
        $client = static::createClient();
        $client -> request('GET', '/accueil');
        $this -> assertResponseRedirects('/');
    }

}