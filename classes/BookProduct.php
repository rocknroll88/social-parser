<?php
require_once 'classes/I3D.php';

class BookProduct extends Product implements I3D
{
    public $numPages;

    public function __construct($name, $price, $numPages)
    {
        parent::__construct($name, $price);
        $this->numPages = $numPages;
        $this->setDiscount(15);
    }

    public function getProduct()
    {
        $out = parent::getProduct();
        $out .= "Цена без скидки: {$this->price}<br>";
        $out .= "Кол-во страниц: {$this->numPages}<br>";
        $out .= "Ваша скидка: {$this->getDiscount()}%<br>";
        return $out;
    }

    /**
     * @return mixed
     */
    public function getCpu()
    {
        return $this->numPages;
    }

    public function addProduct($name, $price, $numPages=0)
    {
        // TODO: Implement addProduct() method.
    }

    public function test()
    {
        var_dump(self::TEST2);
    }


}