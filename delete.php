<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = AuthorQuery::create()->findPK($_POST['id']);
    if ($author) {
        $author->delete();
        echo "Author Deleted Successfully";
    } else {
        echo "Author Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Author</title>
</head>
<body>
<h1>Delete Author</h1>
<form method="post">
    Author ID: <input type="number" name="id"><br>
    <input type="submit" value="Delete Author">
</form>
</body>
</html>
