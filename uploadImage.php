<?php 

    if(isset($_POST['submit'])){

        $fileName = $_FILES['picture']['name'];
        $fileTmpName = $_FILES['picture']['tmp_name'];
        $fileError = $_FILES['picture']['error'];
       
        if($fileError === 0){
            $fileDestination = 'uploads/'.$fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
        }else {
            echo "There was an error";
        }
    }
