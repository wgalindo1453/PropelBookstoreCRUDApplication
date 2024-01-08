<?php
require_once 'vendor/autoload.php';
require_once 'generated-conf/config.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create_author'])) {
        $author = new Author();
        $author->setFirstName($_POST['firstName']);
        $author->setLastName($_POST['lastName']);
        $author->save();
        $message = "Author Created Successfully";
    } elseif (isset($_POST['create_publisher'])) {
        $publisher = new Publisher();
        $publisher->setName($_POST['name']);
        $publisher->save();
        $message = "Publisher Created Successfully";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Entities</title>
</head>
<body>
<h1>Create Author</h1>
<form method="post">
    First Name: <input type="text" name="firstName"><br>
    Last Name: <input type="text" name="lastName"><br>
    <input type="submit" name="create_author" value="Create Author">
</form>

<h1>Create Publisher</h1>
<form method="post">
    Name: <input type="text" name="name"><br>
    <input type="submit" name="create_publisher" value="Create Publisher">
</form>

<?php if ($message): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>
</body>
</html>
