<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

$books = BookQuery::create()
    ->joinWithAuthor()
    ->joinWithPublisher()
    ->find();
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Books</title>
</head>
<body>
<h1>List of Books</h1>
<ul>
    <?php foreach ($books as $book): ?>
        <li>
            <?php echo $book->getTitle() . ' by ' . $book->getAuthor()->getFirstName() . ' ' . $book->getAuthor()->getLastName() . ', published by ' . $book->getPublisher()->getName(); ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
