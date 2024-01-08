<?php
require_once 'vendor/autoload.php'; // Update the path
require_once 'generated-conf/config.php'; // Update the path

$authors = AuthorQuery::create()->find();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Authors</title>
</head>
<body>
<h1>Read Authors</h1>
<ul>
    <?php foreach ($authors as $author): ?>
        <li><?php echo $author->getFirstName() . " " . $author->getLastName(); ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
