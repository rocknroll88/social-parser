<?php

error_reporting(-1);
require_once 'classes/Product.php';
require_once 'classes/NotebookProduct.php';
require_once 'classes/BookProduct.php';
require_once 'classes/I3D.php';

$book = new BookProduct('три мушкетера', 20, 1000);
$notebook = new NotebookProduct('acer', 200,'intel');

echo $book->getProduct();
echo $notebook->getProduct();

echo $book->test();

