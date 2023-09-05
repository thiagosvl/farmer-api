<?php

namespace App\Exceptions;

use Exception;

class FarmerNotfoundException extends Exception
{
    protected $message = 'Farmer not found.';
    public $status = 404;
}
