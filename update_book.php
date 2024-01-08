<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

$books = BookQuery::create()->find();
$authors = AuthorQuery::create()->find();
$publishers = PublisherQuery::create()->find();
$selectedBook = null;
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['book_id'])) {
        $selectedBook = BookQuery::create()->findPK($_POST['book_id']);
    } elseif (isset($_POST['update_book'])) {
        $selectedBook = BookQuery::create()->findPK($_POST['update_book_id']);
        if ($selectedBook) {
            $selectedBook->setTitle($_POST['title']);
            $selectedBook->setAuthorId($_POST['author_id']);
            $selectedBook->setPublisherId($_POST['publisher_id']);
            $selectedBook->save();
            $message = "Book Updated Successfully";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Book</title>
</head>
<body>
<h1>Update Book</h1>

<form method="post">
    Select Book:
    <select name="book_id" onchange="this.form.submit()">
        <option value="">Select a Book</option>
        <?php foreach ($books as $book): ?>
            <option value="<?php echo $book->getId(); ?>" <?php if ($selectedBook && $book->getId() == $selectedBook->getId()) echo 'selected'; ?>>
                <?php echo htmlspecialchars($book->getTitle()); ?>
            </option>
        <?php endforeach; ?>
    </select>
</form>

<?php if ($selectedBook): ?>
    <form method="post">
        <input type="hidden" name="update_book_id" value="<?php echo $selectedBook->getId(); ?>">
        Title: <input type="text" name="title" value="<?php echo htmlspecialchars($selectedBook->getTitle()); ?>"><br>
        Author:
        <select name="author_id">
            <?php foreach ($authors as $author): ?>
                <option value="<?php echo $author->getId(); ?>" <?php if ($author->getId() == $selectedBook->getAuthorId()) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($author->getFirstName() . ' ' . $author->getLastName()); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        Publisher:
        <select name="publisher_id">
            <?php foreach ($publishers as $publisher): ?>
                <option value="<?php echo $publisher->getId(); ?>" <?php if ($publisher->getId() == $selectedBook->getPublisherId()) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($publisher->getName()); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" name="update_book" value="Update Book">
    </form>
<?php endif; ?>

<?php if ($message): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>
</body>
</html>
