<?php

require __DIR__ . '/../autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class Imprimir{
    public function ticket(){
        $connector = new WindowsPrintConnector("");

        $printer = new Printer($connector);
    }
}