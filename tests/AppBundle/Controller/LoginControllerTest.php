<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
{
    public function testLogin()
    {
        $client = static::createClient([]);

        $crawler = $client->request('GET', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Login',$client->getResponse()->getContent());

        $form = $crawler->selectButton('login')->form();
        $form['_username'] = 'test';
        $form['_password'] = 'test';

        $client->submit($form);
        $this->assertTrue(
            $client->getResponse()->isRedirect("http://localhost/todos")
        );

        $form['_username']= 'unknown';
        $form['_password']= 'wrongPassword';

        $client->submit($form);
        $this->assertTrue(
            $client->getResponse()->isRedirect("http://localhost/login")
        );

    }

    public function testLogout(){
        $client = static::createClient([],[
            'PHP_AUTH_USER'=>'test',
            'PHP_AUTH_PW'=>'test'
        ]);
        $client->request('GET','/logout');
        $this->assertTrue(
            $client->getResponse()->isRedirect("http://localhost/login")
        );
    }

    public function testRegister(){
        $client = static::createClient([]);
        $crawler = $client->request('GET','/user/new');
        $this->assertTrue(
            $client->getResponse()->isSuccessful()
        );
    }
}
