<?php

namespace Crud\PersonaBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GestionControllerTest extends WebTestCase
{
    public function testCrear()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/crear');
    }

    public function testLeer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/leer');
    }

    public function testModificar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modificar');
    }

    public function testEliminar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/eliminar');
    }

}
