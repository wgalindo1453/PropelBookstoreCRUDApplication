<?php
require_once 'vendor/autoload.php';
require_once 'generated-conf/config.php';

$authors = AuthorQuery::create()->find();
$publishers = PublisherQuery::create()->find();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_author'])) {
        $author = AuthorQuery::create()->findPK($_POST['author_id']);
        if ($author) {
            $author->setFirstName($_POST['firstName']);
            $author->setLastName($_POST['lastName']);
            $author->save();
            $message = "Author Updated Successfully";
        } else {
            $message = "Author Not Found";
        }
    } elseif (isset($_POST['update_publisher'])) {
        $publisher = PublisherQuery::create()->findPK($_POST['publisher_id']);
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
    Select Author:
    <select name="author_id">
        <?php foreach ($authors as $author): ?>
            <option value="<?php echo $author->getId(); ?>">
                <?php echo $author->getFirstName() . ' ' . $author->getLastName(); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    First Name: <input type="text" name="firstName"><br>
    Last Name: <input type="text" name="lastName"><br>
    <input type="submit" name="update_author" value="Update Author">
</form>

<h1>Update Publisher</h1>
<form method="post">
    Select Publisher:
    <select name="publisher_id">
        <?php foreach ($publishers as $publisher): ?>
            <option value="<?php echo $publisher->getId(); ?>">
                <?php echo $publisher->getName(); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    Name: <input type="text" name="name"><br>
    <input type="submit" name="update_publisher" value="Update Publisher">
</form>

<?php if ($message): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>
</body>
</html>
