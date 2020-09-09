<?php


namespace Hillel\Php;


use Exception;

class Color
{
    private $red;
    private $green;
    private $blue;

    /**
     * ValueObject constructor.
     * @param $red
     * @param $green
     * @param $blue
     */
    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    /**
     * @return mixed
     */
    public function getRed()
    {
        return $this->red;
    }

    /**
     * @param mixed $red
     */
    private function setRed($red)
    {
        if ($red < 0 && $red > 255) {
            throw new Exception('Invalid red color');
        }
        $this->red = $red;
    }

    /**
     * @return mixed
     */
    public function getGreen()
    {
        return $this->green;
    }

    /**
     * @param mixed $green
     */
    private function setGreen($green)
    {
        if ($green < 0 && $green > 255) {
            throw new Exception('Invalid red color');
        }
        $this->green = $green;
    }

    /**
     * @return mixed
     */
    public function getBlue()
    {
        return $this->blue;
    }

    /**
     * @param mixed $blue
     */
    private function setBlue($blue)
    {
        if ($blue < 0 && $blue > 255) {
            throw new Exception('Invalid red color');
        }
        $this->blue = $blue;
    }

    public function equals(Color $color): bool
    {
        return $this->red === $color->getRed() &&
            $this->green === $color->getGreen() &&
            $this->blue === $color->getBlue();
    }
    public static function random(): self
    {
        return new self(rand(0,255),rand(0,255),rand(0,255));
    }

    public function mix(Color $color): self
    {
        return new self (
            round(($this->red + $color->getRed()) /2) ,
            round(($this->green + $color->getGreen()) /2) ,
            round(($this->blue + $color->getBlue()) /2)
        );
    }
}