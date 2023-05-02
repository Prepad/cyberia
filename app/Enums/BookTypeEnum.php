<?php
namespace App\Enums;

enum BookTypeEnum: string
{
    case Graphic = 'графический';
    case Digital = 'Цифровое';
    case Printed = 'Печатное';
}
