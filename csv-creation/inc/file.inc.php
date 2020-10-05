<?php
//Student Number = 300304749
//Name = Manvir Singh Heer

//read the file
function read_mhe_49($fileName)
{

    try {
        //Get a file handle
        $fileHandle = fopen($fileName, 'r');
        if (!$fileHandle) {
            throw new Exception("Cannot open file: " . $fileName);
        }
        //Read in a file
        $fileContents = fread($fileHandle, filesize($fileName));
        //Close file handle
        fclose($fileHandle);
    } catch (Exception $ex) {
        //Output the message of the exception
        echo $ex->getMessage();
    }

    return $fileContents;
}

//write on the file
//$fileContent should be a string
function write_mhe_49( $fileContent)
{

    try {
        //Get a file handle
        $fileName = OUT_FILE;
        //ob_clean();
        $fileHandle = fopen($fileName, 'w');
        if (!$fileHandle) {
            throw new Exception("Cannot open file: " . $fileName);
        }
        //Write in a file
        fwrite($fileHandle, prepareString($fileContent));
        //Close file handle
        fclose($fileHandle);
    } catch (Exception $ex) {
        //Output the message of the exception
        echo $ex->getMessage();
    }
}
