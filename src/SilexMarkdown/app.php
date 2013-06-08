<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Silex\Provider\HttpCacheServiceProvider;
use Silex\Provider\TwigServiceProvider;
use SilexAssetic\AsseticServiceProvider;

use Rg\Silex\Provider\Markdown\MarkdownServiceProvider;

$app = new Silex\Application();

// Config
$env = isset($env) ? $env : 'prod';
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

if (isset($app['assetic.enabled']) && $app['assetic.enabled']) {
    $app->register(new AsseticServiceProvider(), array(
        'assetic.options' => array(
            'debug'            => $app['debug'],
            'auto_dump_assets' => $app['debug'],
        )
    ));

    $app['assetic.filter_manager'] = $app->share(
        $app->extend('assetic.filter_manager', function($fm, $app) {
            $fm->set('lessphp', new Assetic\Filter\LessphpFilter());

            return $fm;
        })
        );

    $app['assetic.asset_manager'] = $app->share(
        $app->extend('assetic.asset_manager', function($am, $app) {
            $am->set('styles', new Assetic\Asset\AssetCache(
                new Assetic\Asset\GlobAsset(
                    $app['assetic.input.path_to_css'],
                    array($app['assetic.filter_manager']->get('lessphp'))
                ),
                new Assetic\Cache\FilesystemCache($app['assetic.path_to_cache'])
            ));
            $am->get('styles')->setTargetPath($app['assetic.output.path_to_css']);

            $am->set('scripts', new Assetic\Asset\AssetCache(
                new Assetic\Asset\GlobAsset($app['assetic.input.path_to_js']),
                new Assetic\Cache\FilesystemCache($app['assetic.path_to_cache'])
            ));
            $am->get('scripts')->setTargetPath($app['assetic.output.path_to_js']);

            return $am;
        })
        );

}



// CONTROLLERS:
// ------------

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

