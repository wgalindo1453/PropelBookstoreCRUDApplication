<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

$authors = AuthorQuery::create()->find();
$publishers = PublisherQuery::create()->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = BookQuery::create()->findPK($_POST['book_id']);
    if ($book) {
        $book->setTitle($_POST['title']);
        $book->setAuthorId($_POST['author_id']);
        $book->setPublisherId($_POST['publisher_id']);
        $book->save();
        echo "Book Updated Successfully";
    }
}

// Assuming you pass the book ID to this script, e.g., update_book.php?book_id=1
$bookId = isset($_GET['book_id']) ? $_GET['book_id'] : null;
$book = null;
if ($bookId) {
    $book = BookQuery::create()->findPK($bookId);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Book</title>
</head>
<body>
<h1>Update Book</h1>
<?php if ($book): ?>
    <form method="post">
        <input type="hidden" name="book_id" value="<?php echo $book->getId(); ?>">
        Title: <input type="text" name="title" value="<?php echo $book->getTitle(); ?>"><br>
        Author:
        <select name="author_id">
            <?php foreach ($authors as $author): ?>
                <option value="<?php echo $author->getId(); ?>" <?php if ($author->getId() == $book->getAuthorId()) echo 'selected'; ?>>
                    <?php echo $author->getFirstName() . ' ' . $author->getLastName(); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        Publisher:
        <select name="publisher_id">
            <?php foreach ($publishers as $publisher): ?>
                <option value="<?php echo $publisher->getId(); ?>" <?php if ($publisher->getId() == $book->getPublisherId()) echo 'selected'; ?>>
                    <?php echo $publisher->getName(); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Update Book">
    </form>
<?php else: ?>
    <p>Book not found.</p>
<?php endif; ?>
</body>
</html>
