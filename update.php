<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = AuthorQuery::create()->findPK($_POST['id']);
    if ($author) {
        $author->setFirstName($_POST['firstName']);
        $author->setLastName($_POST['lastName']);
        $author->save();
        echo "Author Updated Successfully";
    } else {
        echo "Author Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Author</title>
</head>
<body>
<h1>Update Author</h1>
<form method="post">
    Author ID: <input type="number" name="id"><br>
    First Name: <input type="text" name="firstName"><br>
    Last Name: <input type="text" name="lastName"><br>
    <input type="submit" value="Update Author">
</form>
</body>
</html>
