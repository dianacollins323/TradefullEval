<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BirthDate extends Model
{
    protected $table = 'birth_dates';

    public function getMonth()
    {
        $parts = explode("-", $this->birthdate);
        return (int)$parts[1];;
    }

    public function getDay()
    {
        $parts = explode("-", $this->birthdate);
        return (int)$parts[2];;
    }

    public function getYear()
    {
        $parts = explode("-", $this->birthdate);
        return (int)$parts[0];;
    }

    public function getNiceDate()
    {
        $parts = explode("-", $this->birthdate);
        return $parts[1]."/".$parts[2]."/".$parts[0];;
    }
}
