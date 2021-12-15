<?
include_once (__DIR__ . "/connect.php");

if($_POST['submit']) {
    $name = trim(strip_tags($_POST['name']));
    $email = trim(strip_tags($_POST['email']));
    $description = trim(strip_tags($_POST['description']));
    $sql = "INSERT INTO reviews (name, email, description, date) VALUES ('{$name}','{$email}','{$description}', '" . date("Y-m-d"). "')";
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        die(mysqli_error($connect));
    }else{
        header("Location: ./reviews.php");
    }
} else {
    header("Location: ./reviews.php");
}