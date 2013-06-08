<?php

use Silex\WebTestCase;
#use Symfony\Component\HttpFoundation\SessionStorage\FilesystemSessionStorage;

class ApplicationTest extends WebTestCase
{
    public function createApplication()
    {
        // Silex
        $app = require __DIR__.'/../../src/SilexMarkdown/app.php';

        // Tests mode
        $app['debug'] = true;
        $app['exception_handler']->disable();

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
