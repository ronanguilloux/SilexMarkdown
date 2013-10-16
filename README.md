Markdown-generated website
==========================

Generates a markdown-based website, using [Silex PHP micro-framework][s] & your own [markdown][m] files.

[![Build Status](https://secure.travis-ci.org/ronanguilloux/SilexMarkdown.png?branch=master)](http://travis-ci.org/ronanguilloux/SilexMarkdown)
[![Total Downloads](https://poser.pugx.org/ronanguilloux/SilexMarkdown/downloads.png)](https://packagist.org/packages/ronanguilloux/SilexMarkdown)



A damn simple markdown-based website
------------------------------------

**Summary:** markdown-files-based, Bootstrap-based CMS, w/ dynamic navigation menu generation.


![PC Snapshot](https://raw.github.com/ronanguilloux/SilexMarkdown/master/resources/images/screenshot-pc.png)


*Markdown* files use the [markdown syntax][m], a very easy way to add typographical enhancements in your texts.
The `/resources` directory contains various markdown files, prefixed with a ordered number: Just add/modify markdown files in it: they will generate links in the navigation bar of your website.

Just start creating your own markdown files in the `./resources` directory, and your website is up.

[Markdown philosophy reminder](http://daringfireball.net/projects/markdown/syntax#philosophy): "A Markdown-formatted document should be publishable as-is, as plain text, without looking like it’s been marked up with tags or formatting instructions."

Anyway, you can mix html, inline-css (even if it's bad) & markdown between html tags, using a `markdon="1"` html attribute (see muffin.md page in this demo).

Design: The website uses the latest version of [Twitter Bootrap][b]; you can tweak it easely, following the Bootstrap documentation.
Gears: Silexmarkdown project makes use of [php-markdown library][pm] & the [Silex Markdown Service Provider][smsp]


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
        <Directory /path.to/SilexMarkdown/web>
            AllowOverride All
            Allow from all
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.silexmarkdown.log
        CustomLog ${APACHE_LOG_DIR}/access.silexmarkdown.log combined
    </VirtualHost>


Tests
-----

Tests need --dev option while installing dependecing using composer:

    $ composer.phar install --dev
    $ wget https://phar.phpunit.de/phpunit.phar
    $ chmod +x phpunit.phar
    $ ./phpunit.phar


License
-------

This Silex markdown-based website generator is released under the MIT License.  
See the bundled LICENSE file for details.  
You can find a copy of this software here: https://github.com/ronanguilloux/SilexMarkdown


Credits
-------

* [All SilexMarkdown contributors](https://github.com/ronanguilloux/SilexMarkdown/contributors)
* All fake content texts & illustrations come from [http://cupcakeipsum.com][c]
* [http://silex.sensiolabs.org][s]: PHP micro-framework based on the Symfony2 Components
* [http://daringfireball.net/projects/markdown/syntax][m]: easy-to-read and easy-to-write syntax
* [http://michelf.com/projects/php-markdown][pm]: parser for Markdown and Markdown Extra
* [https://github.com/lyrixx/Silex-Kitchen-Edition](https://github.com/lyrixx/Silex-Kitchen-Edition): a bootstrap silex application
* [https://github.com/RobLoach/component-installer](https://github.com/RobLoach/component-installer): installation of Components via Composer
* [http://twitter.github.io/bootstrap][b]: Twitter's front-end framework
* [https://github.com/kriswallsmith/assetic](https://github.com/kriswallsmith/assetic): asset management for PHP
* [https://github.com/ronanguilloux/SilexMarkdownServiceProvider][smsp]: Silex Markdown service provider
* [https://github.com/fabpot/Twig](https://github.com/fabpot/Twig): flexible, fast, and secure template language for PHP

[c]: http://cupcakeipsum.com
[m]: http://daringfireball.net/projects/markdown/syntax
[s]: http://silex.sensiolabs.org/documentation
[t]: http://twig.sensiolabs.org/
[b]: http://twitter.github.com/bootstrap
[pm]:http://michelf.com/projects/php-markdown
[smsp]:https://github.com/ronanguilloux/SilexMarkdownServiceProvider
[0]: https://github.com/ronanguilloux/SilexMarkdown/blob/master/resources/markdown/0-README.md
[1]: https://github.com/ronanguilloux/SilexMarkdown/blob/master/resources/markdown/1-Cupcake.md
[2]: https://github.com/ronanguilloux/SilexMarkdown/blob/master/resources/markdown/2-Cheesecake.md
[3]: https://github.com/ronanguilloux/SilexMarkdown/blob/master/resources/markdown/3-Gingerbread.md
[4]: https://github.com/ronanguilloux/SilexMarkdown/blob/master/resources/markdown/4-Muffin.md
[5]: https://github.com/ronanguilloux/SilexMarkdown/blob/master/resources/markdown/5-Tiramisu.md

