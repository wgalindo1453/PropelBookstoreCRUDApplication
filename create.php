<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = new Author();
    $author->setFirstName($_POST['firstName']);
    $author->setLastName($_POST['lastName']);
    $author->save();

    echo "Author Created Successfully";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Author</title>
</head>
<body>
<h1>Create Author</h1>
<form method="post">
    First Name: <input type="text" name="firstName"><br>
    Last Name: <input type="text" name="lastName"><br>
    <input type="submit" value="Create Author">
</form>
</body>
</html>
