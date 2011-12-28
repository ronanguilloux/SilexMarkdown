<?php

namespace Phpmarkdown\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

require(__DIR__ . '/../MarkdownExtraParser.php');
require(__DIR__ . '/../MarkdownFinder.php');

/**
 * Phpmarkdown Service Provider.
 *
 * @author Ronan <ronan.guilloux@gmail.com>
 */
class PhpmarkdownServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['md.parser'] = $app->share(function () use ($app) {
            return new \MarkdownExtraParser();
        });

        $app['md.finder'] = $app->share(function () use ($app) {
            $args = array();
            if(isset($app['md.path'])){
                $args['path'] = $app['md.path'];
            }
            return new \MarkdownFinder($args);
        });

    }
}
