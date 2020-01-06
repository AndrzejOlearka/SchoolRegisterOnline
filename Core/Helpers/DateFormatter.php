<?php

namespace Core\Helpers;

class DateFormatter
{
    /**
     * get all school weeks with start and end date in Y-m-d format
     *
     * return weeks with days
     */
    public static function getFirstAndLastDaysOfTheWeek(){
        $date = new \DateTime('2020-09-01');
        $week = [];
        for($i = 1; $i <= 50; $i++){
            $date = $date->modify('this week');
            $week[$i]['start'] = $date->modify('this week')->format('Y-m-d');
            $week[$i]['end'] = $date->modify('this week + 6 days')->format('Y-m-d');
            $date = $date->modify('+ 1 day');
        }
        return $week;
    }
}
