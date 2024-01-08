<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookId = isset($_POST['book_id']) ? $_POST['book_id'] : null;
    if ($bookId) {
        $book = BookQuery::create()->findPK($bookId);
        if ($book) {
            $book->delete();
            echo "Book Deleted Successfully";
        }
    }
}

//for demonstration , the deletion form could be on the same page as the book list
header('Location: list_books.php');
exit();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Book</title>
</head>
<body>
<h1>Delete Book</h1>
<form method="post">
    Book ID: <input type="number" name="book_id"><br>
    <input type="submit" value="Delete Book">
</form>
</body>
</html>