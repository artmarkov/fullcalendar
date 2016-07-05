Tecnocen.com Yii2 Bootstrap Year Calendar
=========================

[![Latest Stable Version](https://poser.pugx.org/tecnocen/yii2-fullcalendar/v/stable)](https://packagist.org/packages/tecnocen/yii2-fullcalendar) [![Total Downloads](https://poser.pugx.org/tecnocen/yii2-fullcalendar/downloads)](https://packagist.org/packages/tecnocen/yii2-fullcalendar) [![Latest Unstable Version](https://poser.pugx.org/tecnocen/yii2-fullcalendar/v/unstable)](https://packagist.org/packages/tecnocen/yii2-fullcalendar) [![License](https://poser.pugx.org/tecnocen/yii2-fullcalendar/license)](https://packagist.org/packages/tecnocen/yii2-fullcalendar)

Widget that implements the [fullcalendar](http://fullcalendar.io/) plugin for Yii2

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
composer require --prefer-dist "tecnocen/yii2-fullcalendar:*"
```

or add

```
"tecnocen/yii2-fullcalendar": "*"
```

to the `require` section of your `composer.json` file.

## Usage

### Calendar

This is the basic widget which encapsulates the plugin into a `yii\base\Widget` implementation.

```php

use tecnocen\fullcalendar\widgets\Fullcalendar;

echo Fullcalendar::widget([
    // 'lang' => 'es',
    'options' => [
        // HTML attributes for the container.
        // the `tag` option is specially handled as the HTML tag name
    ],
    'clientOptions' => [
        // JS Options to be passed to the `calendar()` plugin.
        // see http://fullcalendar.com/#Documentation/Options
    ],
    'clientEvents' => [
        // JS Events for the `calendar()` plugin.
        // see http://fullcalendar.com/#Documentation/Events
    ]
]);
```

### Language

The fullcalendar plugin provides the [following languages]
(https://github.com/fullcalendar/fullcalendar/tree/master/lang),
`Fullcalendar` and `ActiveCalendar` support automatic translations using the
`$lang` class property which automatically will load the required js file
and customize the plugin call.

```php
echo Fullcalendar::widget([
    'options' => ['id' => 'es-calendar'],
    'lang' => 'es',
]);
```

Will add the JS File `es.js` to the view and run

```js
jQuery('#es-calendar').calendar({"lang":"es"});
```

## ActiveFullCalendar 
## AjaxFullCalendar

On the browser.

## Documentation

TODO

## License

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.
