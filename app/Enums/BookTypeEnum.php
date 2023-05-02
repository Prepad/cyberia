<?php
namespace App\Enums;

enum BookTypeEnum: string
{
    case Graphic = 'Графический';
    case Digital = 'Цифровое';
    case Printed = 'Печатное';
}
