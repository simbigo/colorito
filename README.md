# Colorito

PHP image manipulation library. The library based on ImageMagick tools (Imagick extension). 

 * [Basic](#introduction)
   * [Introduction](#introduction)
   * [Installation](#installation)
   * Quick start
   * Layers
 * Canvas creation
   * Solid color canvases
   * Gradients of color
 * Color basics and channels
   * @todo
 * Color Modifications
   * Auto Levels
 * Transformations
   * Crop
   * Flip
   * Flop
   * Opacity
   * Rotation


## Introduction

#### What is Colorito?

Colorito is an open source PHP image manipulation library. The library is based on ImageMagick tools. It provides an easier way to create, edit and compose images. It can read and write images in a variety of formats (over 200) including PNG, JPEG, JPEG-2000, GIF, TIFF, DPX, EXR, WebP, Postscript, PDF, and SVG. Use Colorito to resize, flip, mirror, rotate, distort, shear and transform images, adjust image colors, apply various special effects, or draw text, lines, polygons, ellipses and Bézier curves.

Colorito is an great image-to-image converter. It can convert an image in just about any image format to any other image format.

The library follows the FIG guidelines, so it can be integrated easily to an existing project. 


#### About examples of Colorito usage

Many examples and descriptions were taken from the ImageMagick documentation and were adapted to use in PHP. So if you were viewing the original documentation, you will meet a lot of familiar words.

I generally use the JPEG formats for images, but in many examples, I use an image in PNG format. The PNG image format supports images with semi-transparent pixels. In this case I use a "checkerboard" pattern for background of the image. I hope, it will be useful. 

![transparent.png](docs/_assets/img/transparent.png)



## Quick start

#### Load images

The simple way to load a image is call static method ```makeFromFile()```:

```php
use Simbigo\Colorito\Image\Image;

$image = Image::makeFromFile('path/to/source.jpg');
```

#### Conversion of format

If you want change format of the source image, just save it with necessary extension:

```php
use Simbigo\Colorito\Image\Image;

$image = Image::makeFromFile('path/to/source.jpg');
$image->saveAs('path/to/result.png');
```