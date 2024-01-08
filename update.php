<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_author'])) {
        $author = AuthorQuery::create()->findPK($_POST['id']);
        if ($author) {
            $author->setFirstName($_POST['firstName']);
            $author->setLastName($_POST['lastName']);
            $author->save();
            $message = "Author Updated Successfully";
        } else {
            $message = "Author Not Found";
        }
    } elseif (isset($_POST['update_publisher'])) {
        $publisher = PublisherQuery::create()->findPK($_POST['id']);
        if ($publisher) {
            $publisher->setName($_POST['name']);
            $publisher->save();
            $message = "Publisher Updated Successfully";
        } else {
            $message = "Publisher Not Found";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Entities</title>
</head>
<body>
<h1>Update Author</h1>
<form method="post">
    Author ID: <input type="number" name="id"><br>
    First Name: <input type="text" name="firstName"><br>
    Last Name: <input type="text" name="lastName"><br>
    <input type="submit" name="update_author" value="Update Author">
</form>

<h1>Update Publisher</h1>
<form method="post">
    Publisher ID: <input type="number" name="id"><br>
    Name: <input type="text" name="name"><br>
    <input type="submit" name="update_publisher" value="Update Publisher">
</form>

<?php if ($message): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>
</body>
</html>

