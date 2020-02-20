<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    private $client;
    public function __construct()
    {
        $this->client = static::createClient([],[
            'PHP_AUTH_USER'=>'test',
            'PHP_AUTH_PW'=>'test'
        ]);

    }

    public function testChangePassword(){
        $crawler = $this->client->request('GET','/user/test/changePassword');
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $form = $crawler->selectButton('form[change password]')->form();
        $form['form[password][first]']='test';
        $form['form[password][second]']='test';
        $this->client->submit($form);
        $this->assertTrue($this->client->getResponse()->isRedirect());
    }

    public function testEdit(){
        $crawler = $this->client->request('GET','/user/test/edit');

        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $form = $crawler->selectButton('SAVE')->form();
        $form["form[name]"]='test';
        $form['form[designation]']='test';
        $this->client->submit($form);
        $this->assertTrue($this->client->getResponse()->isRedirect());
    }

    public function testProfile()
    {

        $crawler = $this->client->request('GET','/user/test');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());

        $link = $crawler->selectLink('Change password')->link();

        $this->client->click($link);
        $this->assertTrue(
            $this->client->getResponse()->isSuccessful()
        );

        $link = $crawler->selectLink('Edit')->link();
        $this->client->click($link);
        $this->assertTrue(
            $this->client->getResponse()->isSuccessful()
        );

        /*
         * To test delete action
         * caution: logged in user gets deleted
         */
        $link = $crawler->selectLink("Delete Account")->link();
        $this->client->click($link);
        $this->assertTrue(
            $this->client->getResponse()->isRedirect()
        );
    }
}
