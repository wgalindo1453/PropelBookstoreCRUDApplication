<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

// Fetch all authors and publishers to populate the dropdowns
$authors = AuthorQuery::create()->find();
$publishers = PublisherQuery::create()->find();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = new Book();
    $book->setTitle($_POST['title']);
    $book->setAuthorId($_POST['author_id']);
    $book->setPublisherId($_POST['publisher_id']);
    $book->save();

    echo "Book Added Successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add a New Book</title>
</head>
<body>
<h1>Add a New Book</h1>
<form method="post">
    Title: <input type="text" name="title"><br>
    Author:
    <select name="author_id">
        <?php foreach ($authors as $author): ?>
            <option value="<?php echo $author->getId(); ?>">
                <?php echo $author->getFirstName() . ' ' . $author->getLastName(); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    Publisher:
    <select name="publisher_id">
        <?php foreach ($publishers as $publisher): ?>
            <option value="<?php echo $publisher->getId(); ?>">
                <?php echo $publisher->getName(); ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="submit" value="Add Book">
</form>
</body>
</html>
