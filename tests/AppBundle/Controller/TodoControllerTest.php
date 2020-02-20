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

    public function testCreate(){
        $crawler = $this->client->request('GET','/todos/create');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $form = $crawler->selectButton('form[save]')->form();
        $form['form[name]']='test';
        $form['form[category]']='test';
        $form['form[priority]']='high';
        $form['form[description]']='test';
        $this->client->submit($form);

        $this->assertTrue($this->client->getResponse()->isRedirect());

    }

    public function testShow(){

        $crawler = $this->client->request('GET','/todos');

        $link=$crawler->selectLink("test")->link();
        $crawler = $this->client->click($link);
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $link = $crawler->selectLink('Edit')->link();
        $this->client->click($link);
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        /*
         * To test update (done) action
         */
        $link = $crawler->selectLink('mark as done')->link();
        $this->client->click($link);
        $this->assertTrue($this->client->getResponse()->isRedirect());

        /**
         * To test deleting of a task
         * caution: the task gets deleted
         */
        $link = $crawler->selectLink('Delete')->link();
        $this->client->click($link);
        $this->assertTrue($this->client->getResponse()->isRedirect());
    }
}
