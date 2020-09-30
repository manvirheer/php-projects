<?php

//Returns header
function html_header_mhe_49()
{
    echo '<!DOCTYPE html>
    <html>
        <head>
            <title>Lab03 Manvir 49</title>
        </head>
        <body>';
}

//Returns footer
function html_footer_mhe_49()
{
    echo '  </body>
            </html>';
}

//Returns form
function html_form_mhe_49()
{
    echo '<form method="POST" style="margin-left:10px" action="'.$_SERVER['PHP_SELF'].'">
    <label for="month">Month: </label>
    <select id="month" name="monthName">';
    for ($i = 1; $i <= 12; ++$i) {
        echo '<option value='.date('m', mktime(0, 0, 0, $i, 10)).'>'.date('F', mktime(0, 0, 0, $i, 10))
            .'</option>';
    }
    echo '</select>
    <label for="year">Year: </label>
    <select id="year" name="yearNumber">';
    $currentYear = date('Y');
    for ($i = $currentYear; $i > ($currentYear - 5); $i--) {
        echo '<option value='.$i.'>'.$i.'</option>';
    }
    echo '</select>&nbsp;
    <input type="submit" value="SUBMIT"><br>
    </form>';
}

//Prints the Calender
function htmlPrintCalendar_mhe_49($data)
{
    $alpha = $data;
    $dayName = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    echo "<table border='1px' style='margin-left:10px'>"."\n".'<tr>'."\n";
    echo '<tr><td colspan="7" style="height:90px;width:90px; text-align:center"><h1>2020 - September - lab03_mhe_49</h1></td></tr><tr>';
    for ($i = 0; $i < count($dayName); ++$i) {
        echo '<td style="height:90px;width:90px;text-align: center; font: bold 16px Calibri-Regular, serif;">'.$dayName[$i].'</td>';
    }
    echo "</tr><tr>";
    //Feb 2015
    if($alpha[1] == "7*4"){
        for ($x = 0; $x < 28; $x++)    {
            if($x % 7 == 0 && $x != 0){

                echo "</tr><tr>"."\n";
            }
            if($alpha[0][$x] == 0){
                echo '<td style="background-color:#E0DDDC;height:90px;width:90px;text-align: center; font: bold 16px Calibri-Regular, serif;"></td>';
            }
            else{
                echo '<td style="height:90px;width:90px;text-align: center; font: regular 16px Calibri-Regular, serif;">'. $alpha[0][$x] ."</td>";
            }
            
        }
    }

    //Regular
    if($alpha[1] == "7*5"){
        for ($x = 0; $x < 35; $x++)    {
            if($x % 7 == 0 && $x != 0)
            echo "</tr><tr>"."\n";
            if($alpha[0][$x] == 0){
                echo '<td style="background-color:#E0DDDC;height:90px;width:90px;text-align: center; font: bold 16px Calibri-Regular, serif;"></td>';
            }
            else{
                echo '<td style="height:90px;width:90px;text-align: center; font: bold 16px Calibri-Regular, serif;">'. $alpha[0][$x] ."</td>";
            }
            
        }

    }    
    
    //Large (7*6)
    if($alpha[1] == "7*6"){
        for ($x = 0; $x < 42; $x++)    {
            if($x % 7 == 0 && $x != 0)
            echo "</tr><tr>"."\n";
            if($alpha[0][$x] == 0){
                echo '<td style="background-color:#E0DDDC;height:90px;width:90px;text-align: center; font: bold 16px Calibri-Regular, serif;"></td>';
            }
            else{
                echo '<td style="height:90px;width:90px;text-align: center; font: bold 16px Calibri-Regular, serif;">'. $alpha[0][$x] .'</td>';
            }
            
        }
    }
    
    
    echo '</tr>'."\n";
    // }
    echo '</table> <br />';
}
