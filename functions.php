<?php




function upload_image()
{

    if (isset($_POST['submit']) || isset($_POST['update'])) {

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
    echo $sql;
    $con->exec($sql);
}
function get_path()
{
    return pathinfo($_SERVER['PHP_SELF'])["dirname"];
}

function get_item($col, $table, $condition)
{
    include 'connection.php';
    $sql = "SELECT $col FROM $table " . $condition;
    $result = $con->query($sql);
    return $result;
}

function preview_para($para)
{
    return implode(' ', array_slice(explode(' ', $para), 0, 10));
}

function del_item($table, $condition)
{
    include 'connection.php';
    $sql = "DELETE FROM $table WHERE " . $table . "." . $condition;
    $result = $con->query($sql);
}

function up_item($table, $colval, $condition)
{
    include 'connection.php';
    foreach ($colval as $key => $value) {
        $result[$key] = "$key = $value";
    }
    $sql = "UPDATE $table SET  " . implode(", ", $result) . " WHERE $condition";
    $result = $con->query($sql);
}
