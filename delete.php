<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

$authors = AuthorQuery::create()->find();
$publishers = PublisherQuery::create()->find();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_author'])) {
        $author = AuthorQuery::create()->findPK($_POST['author_id']);
        if ($author) {
            $author->delete();
            $message = "Author Deleted Successfully";
        } else {
            $message = "Author Not Found";
        }
    } elseif (isset($_POST['delete_publisher'])) {
        $publisher = PublisherQuery::create()->findPK($_POST['publisher_id']);
        if ($publisher) {
            $publisher->delete();
            $message = "Publisher Deleted Successfully";
        } else {
            $message = "Publisher Not Found";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Entities</title>
</head>
<body>
<h1>Delete Author</h1>
<form method="post">
    Select Author:
    <select name="author_id">
        <?php foreach ($authors as $author): ?>
            <option value="<?php echo $author->getId(); ?>">
                <?php echo $author->getFirstName() . ' ' . $author->getLastName(); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" name="delete_author" value="Delete Author">
</form>

<h1>Delete Publisher</h1>
<form method="post">
    Select Publisher:
    <select name="publisher_id">
        <?php foreach ($publishers as $publisher): ?>
            <option value="<?php echo $publisher->getId(); ?>">
                <?php echo $publisher->getName(); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" name="delete_publisher" value="Delete Publisher">
</form>

<?php if ($message): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>
</body>
</html>
