<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\TwigServiceProvider;

use Rg\Silex\Provider\Markdown\MarkdownServiceProvider;

$app = new Silex\Application();

// Config
$env = (null == $env) ? 'prod' : $env;
if(in_array($env,array('dev','test','prod'))) {
    require __DIR__. "/../../resources/config/$env.php";
}

$app->register(new HttpCacheServiceProvider()); // see ./resources/config

$app->register(new TwigServiceProvider(), array(
    'twig.path'       => __DIR__.'/views',
    'twig.class_path' => __DIR__.'/../vendor/twig/lib',
));

$app->register(new MarkdownServiceProvider(), array(
    'md.path' => __DIR__ .'/../../resources/markdown')
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

