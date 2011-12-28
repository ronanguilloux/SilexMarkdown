<?php

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/../vendor/silex/silex.phar';

$app = new Silex\Application();

// Debug
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path'       => __DIR__.'/../views',
    'twig.class_path' => __DIR__.'/../vendor/twig/lib',
));

$app['autoloader']->registerNamespace('Phpmarkdown', __DIR__.'/../vendor/phpmarkdown/lib');

$app->register(new Phpmarkdown\Provider\PhpmarkdownServiceProvider(), array(
    'md.path' => __DIR__ .'/../resources/markdown')
);

$app->match('/', function() use ($app) {
    return $app->redirect('/0');
})->bind('homepage');

$app->match('/{res}', function($res) use ($app) {
    
    $content = $app['md.finder']->getContent($res);
    if($content){
        $html = $app['md.parser']->transform($content);
        return $app['twig']->render('markdown.html.twig', array(
            'menu' => $app['md.finder']->getList(),
            'current' => $res,
            'html' => $html
            )
        );
    }
    return new Response("The requested page could not be found.", 404);
});

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }
    $message  = "[$code] ";
    switch ($code) {
        case 404:
            $message .= 'The requested page could not be found.';
            break;
        default:
            $message .= 'We are sorry, but something went terribly wrong.';
    }

    return new Response($message, $code);
});

return $app;

