# Yii2 Redirect

[![Latest Stable Version](https://poser.pugx.org/rekurzia/yii2-redirect/v/stable)](https://github.com/rekurzia/yii2-redirect/releases)
[![License](https://poser.pugx.org/rekurzia/yii2-redirect/license)](https://github.com/rekurzia/yii2-redirect/blob/master/LICENSE.md)

Custom Application class which tries to redirect to one of specified routes before handling request.

It's useful if you moved website and forgot to set redirects properly and receiving many `404 Not Found` errors.

Redirects go through standard `\yii\helpers\Url::to()` function, so they'll be `302 Found` redirects.

## Installation

Using Composer:

```
composer require rekurzia/yii2-redirect
```

## Usage

Change your entry script (`index.php`) to use this class:

```php
(new Rekurzia\redirect\Application($config))->run();
```

And add new routes through `redirectRoutes` option:

```php
$config['redirectRoutes'] = [
    'some/route' => ['/site/index'],
    'another/route' => ['/site/index', 'page' => 'another'],
    'some/route?a=b&c=d' => ['/site/index', 'page' => 'abcd'],
    'outside/route' => 'http://www.yiiframework.com',
];
```

## License

MIT. See LICENSE file.
