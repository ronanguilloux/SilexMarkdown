<?php

use Silex\WebTestCase;
use Symfony\Component\HttpFoundation\SessionStorage\FilesystemSessionStorage;
use Silex\Provider\DoctrineServiceProvider;

class ApplicationTest extends WebTestCase
{
    public function createApplication()
    {
        // Silex
        $this->app = require __DIR__.'/../../src/app.php';

        // Tests mode
        $this->app['debug'] = true;
        unset($this->app['exception_handler']);

        return $app;
    }

    public function test404()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/give-me-a-404');

        $this->assertTrue($client->getResponse()->isNotFound());
    }

    public function testMarkdown()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/1');

        $this->assertTrue($client->getResponse()->isOk());
        $this->assertEquals(1, $crawler->filter('a[href="http://slipsum.com"]')->count());
    }
}
