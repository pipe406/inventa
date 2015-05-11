<?php

namespace M7\EditorBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ManagerControllerTest extends WebTestCase
{
    public function testNewdoc()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/newDoc');
    }

    public function testOpendoc()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/openDoc');
    }

    public function testSavedoc()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/saveDoc');
    }

}
