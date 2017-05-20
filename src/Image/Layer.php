<?php

declare(strict_types = 1);

namespace Simbigo\Colorito\Image;

use Imagick;

/**
 * Class Layer
 */
class Layer extends AbstractCanvas implements LayerInterface
{
    /**
     * @var int
     */
    private $blendMode = -1;
    /**
     * @var ImageInterface parent image instance
     */
    private $context;
    /**
     * @var Imagick
     */
    private $imagick;
    /**
     * @var string the original image path
     */
    private $sourcePath;

    /**
     * Layer constructor.
     */
    public function __construct()
    {
        $this->initLayer();
    }

    /**
     * Initialize the layer
     *
     * @return void
     */
    protected function initLayer()
    {
        $this->imagick = new Imagick();
    }

    /**
     * Return blend mode of the layer
     *
     * @return int
     */
    public function getBlendMode(): int
    {
        return $this->blendMode;
    }

    /**
     * Return Image instance if it is set as a parent of the layer
     *
     * @return ImageInterface|null
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Return source path of the layer if it was created from file
     *
     * @return string|null
     */
    public function getSourcePath()
    {
        return $this->sourcePath;
    }

    /**
     * Load image file as the layer content
     *
     * @param string $fileName
     * @return static|LayerInterface
     */
    public function loadFile(string $fileName): LayerInterface
    {
        $this->initLayer();
        $this->imagick->addImage(new Imagick($fileName));
        return $this;
    }

    /**
     * Build the canvas object as instance of Imagick
     *
     * @return Imagick
     */
    public function makeImage(): Imagick
    {
        $this->applyModifiers($this->imagick);
        return $this->imagick;
    }

    /**
     * Set blend mode
     *
     * @param $mode
     * @return static|LayerInterface
     */
    public function setBlendMode(int $mode): LayerInterface
    {
        $this->blendMode = $mode;
        return $this;
    }

    /**
     * Set Image instance as a parent of the layer
     *
     * @param ImageInterface $context
     * @return static|LayerInterface
     */
    public function setContext(ImageInterface $context): LayerInterface
    {
        $this->context = $context;
        return $this;
    }
}
