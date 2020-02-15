<?php





function upload_image()
{

    if (isset($_POST['submit'])) {

        $fileName = $_FILES['picture']['name'];
        $fileTmpName = $_FILES['picture']['tmp_name'];
        $fileError = $_FILES['picture']['error'];

        if ($fileError === 0) {
            $fileDestination = 'uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
        } else {
            echo "There was an error";
        }
    }
}

function add_item($table, $arr1, $arr2)
{
    include 'connection.php';
    $col = implode(", ", $arr1);
    $val = implode(", ", $arr2);
    $sql = "INSERT INTO $table ($col) VALUES ($val);";
    $con->exec($sql);
}

function get_item($table)
{
    include 'connection.php';
    $sql = "SELECT * FROM $table";
    $result = $con->query($sql);
    return $result;
}
function get_path()
{
    return pathinfo($_SERVER['PHP_SELF'])["dirname"];
}
