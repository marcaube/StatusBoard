# StatusBoard

**StatusBoard** is a small PHP library that helps you render [StatusBoard](http://panic.com/statusboard/) widgets like
graphs and tables. It provides classes to handle tables, graphs and DIY widgets.

[![Build Status](https://travis-ci.org/marcaube/StatusBoard.png?branch=master)](https://travis-ci.org/marcaube/StatusBoard)
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/marcaube/StatusBoard/badges/quality-score.png?s=a478bbd524d03e6909e5560a4b10e3775ce022ce)](https://scrutinizer-ci.com/g/marcaube/StatusBoard/)
[![Code Coverage](https://scrutinizer-ci.com/g/marcaube/StatusBoard/badges/coverage.png?s=3173a082911b93f967a732443565f71d91063f56)](https://scrutinizer-ci.com/g/marcaube/StatusBoard/)

## Usage

This project is not ready for use, come back later!

### Create a table widget

```php
<?php

require '../vendor/autoload.php';

// Create a Table widget
$widget = new StatusBoard\Widget\TableWidget();
$widget->setRows(array(
    array('Project', 'Version', 'lang', 'Status'),
    array('StatusBoard', '0.1.0', 'PHP', 'Ok'),
    array('ObHighchartsBundle', '1.0.0', 'PHP', 'Fail')
));

// Register an HTML renderer
$renderer = new StatusBoard\Renderer\WidgetRenderer();
$renderer->setRenderers(array(
    new StatusBoard\Renderer\HtmlRenderer()
));

echo $renderer->render($widget);
```

## Installation

You can install StatusBoard using composer, just create a `composer.json` file for your project:

```json
{
    "require": {
        "ob/statusboard": "*"
    }
}
```

And run these two commands to install it:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ composer install
```

Now, you just have to `require` the autoloader in your project to have access to the library:

```php
<?php

require 'vendor/autoload.php';
```

Voilà!


## Requirements

- PHP >= 5.3


## Contributing

See the [CONTRIBUTING.md](CONTRIBUTING.md) file.


## Running the tests

If not done already, install the dependencies and generate the autoloader with composer:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ composer install --dev
```

Once installed, just run the following command:

```bash
$ phpunit -c tests/
```

You can also check for code coverage:

```bash
$ phpunit --coverage-text -c tests/
```


## Credits

Thanks to [Panic](http://panic.com) for their affordable, easy to hack [StatusBoard](http://panic.com/statusboard/)
application.


## License

StatusBoard is released under the MIT License. See the bundled [LICENSE](LICENSE) file for details.