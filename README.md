Markdown-generated website
==========================

Generates a markdown-based website, using [Silex micro-framework][s] & your own [markdown][m] files.


A markdown-based website, the easy way
--------------------------------------

Markdown files use the [markdown syntax][m], a very easy way to add typographical enhancements in your texts.
All markdown files in the `./resource` directory are displayed as links in the navigation bar above
(all demo files texts come from [Cupcake Ipsum][l]).

The `/resources` directory contains various markdown files, prefixed with a ordered number:

* [0-start.md][0]
* [1-show.md][1]
* [2-money.md][2]

etc.

The website use lastest version of [Twig][t] & [Twitter Bootrap][tb]

Installation
------------

*  `git clone git@github.com:ronanguilloux/Silex-Markdown.git`
*  Include/copy/adapat the ./bin/apache2.conf file for your own web server configuration

``` bash
$ composer.phar install --dev
```

Apache2 vhost example:

``` xml
<VirtualHost *:80>
    ServerName www.silexmarkdown
    DocumentRoot /path.to/SilexMarkdown/web
    DirectoryIndex index.php
    ErrorLog /var/log/apache2/error.silexmarkdown.log
    CustomLog /var/log/apache2/access.silexmarkdown.log combined
</VirtualHost>
```


Just start creating your own markdown files in the resources/ directory, and your website is up.

Tests
-----

Tests need --dev option while installing dependecing using composer:

``` bash
$ composer.phar install --dev
$ phpunit
```


Support
-------

Ronan Guilloux - ronan.guilloux@gmail.com

Credits
-------

* http://silex.sensiolabs.org/documentation
* http://daringfireball.net/projects/markdown/syntax
* http://michelf.com/projects/php-markdown
* https://github.com/lyrixx/Silex-Kitchen-Edition

![John Gruber, Portrait by George Del Barrio][i]

John Gruber, Portrait by George Del Barrio

_This is the 0-start.md file, rendered as a web page, using Silex & Markdown._

[l]: http://slipsum.com
[m]: http://daringfireball.net/projects/markdown/syntax
[i]: http://daringfireball.net/graphics/author/addison-bw-425.jpg
[s]: http://silex.sensiolabs.org/documentation
[t]: http://twig.sensiolabs.org/
[b]: http://html5boilerplate.com
[tb]: http://twitter.github.com/bootstrap
[0]: /0
[1]: /1
[2]: /2
[3]: /3
[4]: /4

