<?php

namespace App\Helpers;

class Alert
{
    public static function printMessage($message, $type)
    {
        echo "<div  style='text-align:center;margin-bottom:0;' class='alert alert-$type'> $message</div>";
    }
}