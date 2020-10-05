<?php

//Student Number = 300304749
//Name = Manvir Singh Heer

//required files
require_once("inc/config.inc.php");
require_once("inc/file.inc.php");
require_once("inc/receipt.inc.php");
require_once("inc/html.inc.php");
require_once("inc/validation.inc.php");

html_header_mhe_49();


//If there are files to process
if (!empty($_FILES))    {
    //Check for errors
    $errors = validate_mhe_49();
    //No errors?
    if (empty($errors)) {
        //Read the file
        $fileContents = read_mhe_49($_FILES['fileToUpload']['tmp_name']);
        //Parse the contents
        $items = parseItems_mhe_49($fileContents);
    }
}

//If the file is empty or error exit
if (!empty($_FILES) && !empty($errors))  {
    //Show the errors
    html_showErrors_mhe_49($errors);
    //show the upload form
    html_form_mhe_49();
} else if (isset($items))   {
    html_table_mhe_49($items);
    write_mhe_49($items);
} else {
    //If you are here the user just requested the page.
    html_form_mhe_49();

}


//html_table_mhe_49();

html_footer_mhe_49();