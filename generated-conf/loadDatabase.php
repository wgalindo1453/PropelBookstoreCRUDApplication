<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'bookstore' => 
  array (
    'tablesByName' => 
    array (
      'author' => '\\Map\\AuthorTableMap',
      'book' => '\\Map\\BookTableMap',
      'publisher' => '\\Map\\PublisherTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Author' => '\\Map\\AuthorTableMap',
      '\\Book' => '\\Map\\BookTableMap',
      '\\Publisher' => '\\Map\\PublisherTableMap',
    ),
  ),
));
