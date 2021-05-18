<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function testDisplayLogin() {
        $client = static::createClient();
        $client -> request('GET', '/');
        $this -> assertSelectorTextContains('H1', 'Bienvenue sur HopiPanel');
        $this -> assertSelectorNotExists('.alert.alert-danger');
    }

    public function testLoginWithBadCredentials() {
        $client = static::createClient();
        $crawler = $client -> request('GET', '/');
        $form = $crawler -> selectButton('Connexion')->form([
            'UserName' => 'admin',
            'password' => 'badpass'
        ]);
        $client -> submit($form);
        $this -> assertResponseRedirects('/');
        $client -> followRedirect();
        $this -> assertSelectorExists('.alert.alert-danger');
    }

    public function testSuccessLogin() {
        $client = static::createClient();
        $crawler = $client -> request('GET', '/');
        $form = $crawler -> selectButton('Connexion')->form([
            'UserName' => 'admin',
            'password' => 'adminadmin'
        ]);
        $client -> submit($form);
        $this -> assertResponseRedirects('/accueil');
        $client -> followRedirect();
        $this -> assertSelectorTextContains('H1', 'Accueil');
    }
}