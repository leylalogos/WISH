<?php
namespace App\Models;

trait JalaliDateTrait
{
    public function getJalaliMonthAttribute()
    {
        return $this->getjalaliDate()->format('%B');
    }

    public function getJalaliDayAttribute()
    {
        return $this->getjalaliDate()->format('%d');
    }

    public function getJalaliDateAttribute()
    {
        return $this->getjalaliDate()->format('%Y/%m/%d');
    }
}
