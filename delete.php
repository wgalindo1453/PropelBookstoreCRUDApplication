<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $author = AuthorQuery::create()->findPK($_POST['id']);
//    if ($author) {
//        $author->delete();
//        echo "Author Deleted Successfully";
//    } else {
//        echo "Author Not Found";
//    }
//}


$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_author'])) {
        $author = AuthorQuery::create()->findPK($_POST['id']);
        if ($author) {
            $author->delete();
            $message = "Author Deleted Successfully";
        } else {
            $message = "Author Not Found";
        }
    } elseif (isset($_POST['delete_publisher'])) {
        $publisher = PublisherQuery::create()->findPK($_POST['id']);
        if ($publisher) {
            $publisher->delete();
            $message = "Publisher Deleted Successfully";
        } else {
            $message = "Publisher Not Found";
        }
    }
}

?>

<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>Delete Author</title>-->
<!--</head>-->
<!--<body>-->
<!--<h1>Delete Author</h1>-->
<!--<form method="post">-->
<!--    Author ID: <input type="number" name="id"><br>-->
<!--    <input type="submit" value="Delete Author">-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
<!DOCTYPE html>
<html>
<head>
    <title>Delete Entities</title>
</head>
<body>
<h1>Delete Author</h1>
<form method="post">
    Author ID: <input type="number" name="id"><br>
    <input type="submit" name="delete_author" value="Delete Author">
</form>

<h1>Delete Publisher</h1>
<form method="post">
    Publisher ID: <input type="number" name="id"><br>
    <input type="submit" name="delete_publisher" value="Delete Publisher">
</form>

<?php if ($message): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>
</body>
</html>