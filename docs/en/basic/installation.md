# Installation

### System requirements

Colorito requires the following components to work correctly: 

 * PHP >= 7.0
 * Imagick PHP extension
 
### Composer Installation

The best way to install Colorito is quickly with [Composer](http://getcomposer.org/). 

To install the most recent version, run the following command:

```
composer require simbigo/colorito
```

### Usage

```php
use Simbigo\Colorito\Image\Image;

require __DIR__ . '/vendor/autoload.php';

$image = Image::makeFromFile('source.jpg')->saveAs('result.png');
```