<?php


class Car
{
    public $color;
    public $wheels;
    public $speed;
    public $brand;
    public static $countCar=0;

    const TEST_CAR = 'Прототип';
    const TEST_CAR_SPEED = 300;

    public function __construct($color, $wheels, $speed, $brand)
    {
        $this->color = $color;
        $this->wheels = $wheels;
        $this->speed = $speed;
        $this->brand = $brand;
        self::$countCar++ ;
    }

    public static function getCount()
    {
        return self::$countCar;
    }

    public function getCarInfo()
    {
        return "<h3>О моем автомобиле</h3>
        Марка: {$this->brand}<br>
        Цвет: {$this->color}<br>
        ";
    }

    public function getProtoInfo()
    {
        return "<h3>Данные тестового авто</h3>
        Наименование: " . self::TEST_CAR ." <br>
        Скорость: " . self::TEST_CAR_SPEED ." <br>
        ";
    }
}