Markdown-generated website
==========================

Generates a markdown-based website, using [Silex micro-framework][s] & your own [markdown][m] files.

All markdown files in the /resource directory are displayed as links in the navigation bar above. Markdown files use the [markdown syntax][m].

All lorem ipsum-like paragraphs come from [Samuel L. Ipsum][l].

The */resources* directory contains 5 markdown files:

* [0-start.md][0]
* [1-show.md][1]
* [2-money.md][2]
* [3-Do you see any Teletubbies?.md][3]
* [4-gun.md][4]

It already embeds :

* [Twig][t]
* [HTML5 boilerplate][b]
* [Twitter Bootrap][tb]

Installation
------------

*  `git clone git@github.com:ronanguilloux/Silex-Markdown.git`
*  Include/copy/adapat the ./bin/apache2.conf file for your own web server configuration

Just start creating your own markdown files in the resources/ directory, and your website is up.

Tests
-----

Just run `phpunit`

Support
-------

Ronan Guilloux - ronan.guilloux@gmail.com

Credits
-------

* http://silex.sensiolabs.org/documentation
* http://daringfireball.net/projects/markdown/syntax
* http://michelf.com/projects/php-markdown

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