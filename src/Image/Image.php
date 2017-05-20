<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Image;

use Imagick;
use Simbigo\Colorito\Color;
use Simbigo\Colorito\Exceptions\EmptyCanvasException;
use Simbigo\Colorito\Exceptions\RangeException;

/**
 * Class Image
 *
 * Implements operation about image canvas
 */
class Image extends AbstractCanvas implements ImageInterface
{
    /**
     * @var Color
     */
    private $background;
    /**
     * @var LayerInterface[]
     */
    protected $layers = [];
    /**
     * @var string
     */
    public $layerClass = Layer::class;

    /**
     * Create a new Image instance and import an image as a layer
     *
     * @param string $fileName image source path
     * @return static|Image
     */
    public static function makeFromFile($fileName): Image
    {
        $image = new static();
        $image->createLayerFromFile($fileName);
        return $image;
    }

    /**
     * Image constructor.
     */
    public function __construct()
    {
        $this->setBackground(new Color(Color::TRANSPARENT));
    }

    /**
     * Generate background layer
     *
     * @param Imagick $canvas
     * @return Imagick
     */
    protected function makeBackground(Imagick $canvas): Imagick
    {
        $width = $canvas->getImageWidth();
        $height = $canvas->getImageHeight();
        $finalImage = new Imagick();
        $finalImage->newImage($width, $height, $this->background->getValue());
        $finalImage->compositeImage($canvas, Imagick::COMPOSITE_DEFAULT, 0, 0);
        return $finalImage;
    }

    /**
     * Append the layer as last item of the layers list
     *
     * @param LayerInterface $layer
     * @return static|ImageInterface
     */
    public function addLayer(LayerInterface $layer): ImageInterface
    {
        $layer->setContext($this);
        $this->layers[] = $layer;
        return $this;
    }

    /**
     * Return number of layers the image contains
     *
     * @return int
     */
    public function countLayers(): int
    {
        return count($this->layers);
    }

    /**
     * Create and return a new layer by params
     *
     * @param int $width
     * @param int $height
     * @param Color $background
     * @return LayerInterface
     */
    public function createLayer(int $width, int $height, Color $background = null): LayerInterface
    {
        if ($background === null) {
            $background = new Color(Color::TRANSPARENT);
        }

        /** @var LayerInterface $layer */
        $layer = new $this->layerClass;
        $layer->makeImage()->newImage($width, $height, $background);
        $this->addLayer($layer);
        return $layer;
    }

    /**
     * Create a layer from image file
     *
     * @param string $fileName
     * @return LayerInterface
     */
    public function createLayerFromFile(string $fileName): LayerInterface
    {
        /** @var LayerInterface $layer */
        $layer = new $this->layerClass;
        $layer->loadFile($fileName);
        $this->addLayer($layer);
        return $layer;
    }

    /**
     * Return background color
     *
     * @return Color
     */
    public function getBackground(): Color
    {
        return $this->background;
    }

    /**
     * Return first layer
     *
     * @return LayerInterface
     * @throws \Simbigo\Colorito\Exceptions\RangeException
     */
    public function getFirstLayer(): LayerInterface
    {
        return $this->getLayer(0);
    }

    /**
     * Return last layer
     *
     * @return LayerInterface
     * @throws \Simbigo\Colorito\Exceptions\RangeException
     */
    public function getLastLayer(): LayerInterface
    {
        $index = count($this->layers) - 1;
        return $this->getLayer($index);
    }

    /**
     * Return a layer by index
     *
     * @param int $index
     * @return LayerInterface
     * @throws RangeException
     */
    public function getLayer(int $index): LayerInterface
    {
        if (!$this->hasLayer($index)) {
            throw new RangeException($index);
        }
        return $this->layers[$index];
    }

    /**
     * Return a layers collection
     *
     * @return LayerInterface[]
     */
    public function getLayers(): array
    {
        return $this->layers;
    }

    /**
     * Check if the layer exists
     *
     * @param int $index
     * @return bool
     */
    public function hasLayer(int $index): bool
    {
        return array_key_exists($index, $this->layers);
    }

    /**
     * Build the canvas object as instance of Imagick
     *
     * @return Imagick
     * @throws EmptyCanvasException
     */
    public function makeImage(): Imagick
    {
        if ($this->countLayers() === 0) {
            throw new EmptyCanvasException();
        }

        $canvas = new Imagick();
        $layers = $this->getLayers();
        $firstLayer = array_shift($layers);
        $canvas->addImage($firstLayer->makeImage());
        foreach ($layers as $layer) {
            $canvas->compositeImage($layer->makeImage(), $layer->getBlendMode(), 0, 0);
        }

        $this->applyModifiers($canvas);

        return $this->makeBackground($canvas);
    }

    /**
     * Save a final image
     *
     * @param string $destinationPath
     * @return bool
     * @throws EmptyCanvasException
     */
    public function saveAs(string $destinationPath): bool
    {
        return $this->makeImage()->writeImage($destinationPath);
    }

    /**
     * Save image with transparent background
     *
     * @param int $width
     * @param int $height
     * @param string $destinationPath
     * @return bool
     */
    public function saveEmptyAs(int $width, int $height, string $destinationPath): bool
    {
        $canvas = new Imagick();
        $canvas->newImage($width, $height, 'white');
        $canvas->setImageOpacity(0);
        return $canvas->writeImage($destinationPath);
    }

    /**
     * Set background color
     *
     * @param Color $background
     * @return $this
     */
    public function setBackground(Color $background)
    {
        $this->background = $background;
        return $this;
    }
}