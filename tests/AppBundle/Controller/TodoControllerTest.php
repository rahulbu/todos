<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TodoControllerTest extends WebTestCase
{
    private $client;
    public function __construct()
    {
        $this->client = static::createClient([],[
            'PHP_AUTH_USER'=>'test',
            'PHP_AUTH_PW'=>'test'
        ]);
    }

    public function testIndex()
    {
        $crawler = $this->client->request('GET', '/todos');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $link = $crawler->selectLink('Create')->link();
        $this->client->click($link);
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $link = $crawler->selectLink('Todos')->link();
        $this->client->click($link);
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    public function testCreate(){ // /todos/create
        $this->client->request('GET','/todos/create');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    public function testEdit(){ // /todos/{id}/edit
        $this->client->request('GET','/todos/35/edit');
        $this->assertTrue($this->client->getResponse()->isSuccessful());
    }

    public function testShow(){ //  /todos/{id}
        $this->expectException('InvalidArgumentException');

        $crawler = $this->client->request('GET','/todos/35');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

            $link = $crawler->selectLink('mark as done')->link(); // throws exception after first time run
            $this->client->click($link);
            $this->assertTrue($this->client->getResponse()->isRedirect());

        $link = $crawler->selectLink('Edit')->link();
        $this->client->click($link);
        $this->assertTrue($this->client->getResponse()->isSuccessful());

//        $link = $crawler->selectLink('Delete')->link();
//        $this->client->click($link);
//        $this->assertTrue($this->client->getResponse()->isRedirect());

    }
}
