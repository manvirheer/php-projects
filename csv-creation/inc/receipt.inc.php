<?php

/* This function will parse the string from our file into a multi-dimensional array. */
function parseItems($fileContents)
{

    $items = array();
    $subTotal = 0;
    try {
        //Cut the file by line
        $lines = explode("\n", $fileContents);

        //Add each line as a language to an array
        for ($x = 1; $x < (sizeof($lines)-1); $x++) {

            $columns = explode(",", $lines[$x]);
            
        
            
            if (sizeof($columns) != 4) {
                throw new Exception("There was a problem parsing the file on line: " . ($x + 1));
            }

            $columns[] = "$" . sprintf("%.2f",((float)str_replace('$', '', $columns[2]) * (float)$columns[3]));
            $items[] = $columns;
            $subTotal += sprintf("%.2f",((float)str_replace('$', '', $columns[2]) * (float)$columns[3]),2);
        }
        $items[] = "$" . $subTotal;
        $items[] =  TAX * $subTotal;
        $items[] = ($subTotal + (TAX * $subTotal));
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }

    return $items;
}

//Function to return the string for writing the csv file
function prepareString($arr)
{

    $result = "";
    $result .= "id,item,cost,quantity,price\n";
    for ($i = 0; $i < (count($arr) - 3); $i++) {
        //Concatenating the values to $result with line break at the end
        $row = $arr[$i][0] . "," . $arr[$i][1] . "," . $arr[$i][2] . "," . substr($arr[$i][3], 0, -1) . "," . $arr[$i][4] . "\n"  ;
        $result .= $row;
    }
    $result .= "Subtotal,";
    $result .= $arr[count($arr) - 3] . "\n";
    
    $result .= "Taxes,";
    $result .= "$" . sprintf("%.2f", $arr[count($arr) - 2]) . "\n";
    
    $result .= "Total,";
    $result .= "$" . sprintf("%.2f", $arr[count($arr) - 1]) . "\n";
    
    return $result;
}
