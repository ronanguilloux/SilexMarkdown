Markdown-generated website
==========================

Generates a markdown-based website, using [Silex micro-framework][s] & your own [markdown][m] files.


A markdown-based website, the easy way
--------------------------------------

*Markdown* files use the [markdown syntax][m], a very easy way to add typographical enhancements in your texts.
All markdown files in the `./resource` directory are displayed as links in the navigation bar above
(all demo files texts come from [Cupcake Ipsum][c]).

The website uses the lastest version of [Twitter Bootrap][b].

The `/resources` directory contains various markdown files, prefixed with a ordered number:

* [0-README.md][0] - the file your are just reading
* [1-Cupcake.md][1]
* [2-Cheesecake.md][2]
* [3-Gingerbread.md][3]
* [4-Muffin.md][4]
* [5-Tiramisu.md][5]

etc.

Just start creating your own markdown files in the `./resources` directory, and your website is up.


Installation
------------

    $ git clone git@github.com:ronanguilloux/Silex-Markdown.git
    $ curl -sS https://getcomposer.org/installer | php
    $ composer.phar install --dev

Apache2 vhost example:

    <VirtualHost *:80>
        ServerName silexmarkdown
        DocumentRoot /path/to/SilexMarkdown/web
        DirectoryIndex index.php
        ErrorLog /var/log/apache2/error.silexmarkdown.log
        CustomLog /var/log/apache2/access.silexmarkdown.log combined
    </VirtualHost>


Tests
-----

Tests need --dev option while installing dependecing using composer:

    $ composer.phar install --dev
    $ phpunit


License
-------

This Silex Service Provider is released under the MIT License.  
See the bundled LICENSE file for details.  
You can find a copy of this software here: https://github.com/ronanguilloux/SilexMarkdown



Credits
-------

* Fake content texts & illustrations: [http://cupcakeipsum.com](http://cupcakeipsum.com)
* [All contributors](https://github.com/ronanguilloux/SilexMarkdown/contributors)
* [http://silex.sensiolabs.org](http://silex.sensiolabs.org): PHP micro-framework based on the Symfony2 Components
* [http://daringfireball.net/projects/markdown/syntax](http://daringfireball.net/projects/markdown/syntax): easy-to-read and easy-to-write syntax
* [http://michelf.com/projects/php-markdown](http://michelf.com/projects/php-markdown): parser for Markdown and Markdown Extra
* [https://github.com/lyrixx/Silex-Kitchen-Edition](https://github.com/lyrixx/Silex-Kitchen-Edition): a bootstrap silex application
* [https://github.com/RobLoach/component-installer](https://github.com/RobLoach/component-installer): installation of Components via Composer
* [http://twitter.github.io/bootstrap](http://twitter.github.io/bootstrap): Twitter's front-end framework
* [https://github.com/kriswallsmith/assetic](https://github.com/kriswallsmith/assetic): asset management for PHP
* [https://github.com/ronanguilloux/SilexMarkdownServiceProvider](https://github.com/ronanguilloux/SilexMarkdownServiceProvider): Silex Markdown service provider
* [https://github.com/fabpot/Twig](https://github.com/fabpot/Twig): flexible, fast, and secure template language for PHP 

[c]: http://cupcakeipsum.com
[m]: http://daringfireball.net/projects/markdown/syntax
[s]: http://silex.sensiolabs.org/documentation
[t]: http://twig.sensiolabs.org/
[b]: http://twitter.github.com/bootstrap
[0]: /0
[1]: /1
[2]: /2
[3]: /3
[4]: /4
[5]: /5

