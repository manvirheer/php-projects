<?php

//required files
require_once("inc/config.inc.php");
require_once("inc/file.inc.php");
require_once("inc/receipt.inc.php");
require_once("inc/html.inc.php");
require_once("inc/validation.inc.php");

html_header();


//If there are files to process
if (!empty($_FILES))    {
    //Check for errors
    $errors = validate();
    //No errors?
    if (empty($errors)) {
        //Read the file
        $fileContents = read($_FILES['fileToUpload']['tmp_name']);
        //Parse the contents
        $items = parseItems($fileContents);
    }
}

//If the file is empty or error exit
if (!empty($_FILES) && !empty($errors))  {
    //Show the errors
    html_showErrors($errors);
    //show the upload form
    html_form();
} else if (isset($items))   {
    html_table($items);
    write_mhe($items);
} else {
    //If you are here the user just requested the page.
    html_form();

}


//html_table();

html_footer();
