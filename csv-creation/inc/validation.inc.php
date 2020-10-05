<?php
//Student Number = 300304749
//Name = Manvir Singh Heer

function validate_mhe_49() {
    $errors = array();

    if (empty($_FILES['fileToUpload']['tmp_name'])) { //No File selected
        $errors[] = "Please select a file to upload.";
    }
    elseif(!preg_match("/csv/",$_FILES['fileToUpload']['name'])){ //Check for the file type
        $fileName = $_FILES['fileToUpload']['name'];
        $errors[] = "Only CSV files are supported.";
    }

    return $errors;
}

?>