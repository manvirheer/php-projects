<?php

function getCalenderData_mhe_49($userInput)
{

    $monthName = $userInput['monthName'];
    $yearNumber = $userInput['yearNumber'];
    $alpha = [[], '7*5'];
    $monthNumber = strtotime($monthName);
    $numDays = cal_days_in_month(CAL_GREGORIAN, $monthName, $yearNumber);
    $firstDate = date('D',
    mktime(0, 0, 0, $monthName, $yearNumber));
    $day = date('l', mktime(0, 0, 0, $monthName, 1, $yearNumber));
    $firstDate = substr($day, 0, 3);
    switch ($firstDate) {
        case 'Sun':
            $blank = 0;
        break;
        case 'Mon':
            $blank = 1;
        break;
        case 'Tue':
            $blank = 2;
        break;
        case 'Wed':
            $blank = 3;
        break;
        case 'Thu':
            $blank = 4;
        break;
        case 'Fri':
            $blank = 5;
        break;
        case 'Sat':
            $blank = 6;

        break;
    }
    //Feb 2015
    for ($i = 0; $i < $blank; $i++) {
        $alpha[0][] = 0;
    }
    if ($blank == 0 && $numDays == 28  ) {
        $alpha[1] = '7*4';
        for ($i = $blank; $i < (28 - (28 - $numDays) + $blank); $i++) {
            $alpha[0][] = ($i + 1) - $blank;
        }
    }
    else if (($blank == 6 && $numDays >= 30) || ($blank == 5 && $numDays > 30)) {
        $alpha[1] = '7*6';
        for ($i = $blank; $i < (42 - (42 - $numDays) + $blank); $i++) {
            $alpha[0][] = ($i + 1) - $blank;
        }
        for ($i = (42 - (42 - $numDays) + $blank); $i < 42; $i++) {
            $alpha[0][] = 0;
        }
    } else {
        $alpha[1] = '7*5';
        for ($i = $blank; $i < ((35 - (35 - $numDays)) + $blank); $i++) {
            $alpha[0][] = ($i + 1) - $blank;
        }
        for ($i = (35 - (35 - $numDays) + $blank); $i < 35; $i++) {
            $alpha[0][] = 0;
        }
    }
    
    return($alpha);
    //return $data;
}
