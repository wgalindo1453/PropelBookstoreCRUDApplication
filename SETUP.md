# Propel PHP Project Setup Guide

This guide provides step-by-step instructions for setting up a PHP project using Propel as an ORM (Object-Relational Mapping) tool. This setup is ideal for projects like a bookstore application where you manage data in a relational database.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Initial Setup](#initial-setup)
- [Project Configuration](#project-configuration)
- [Database Schema](#database-schema)
- [Generating Classes](#generating-classes)
- [CRUD Operations](#crud-operations)
- [Additional Resources](#additional-resources)

## Prerequisites

- PHP 7.4 or newer.
- MySQL or a similar relational database system.
- Composer for managing PHP dependencies.

## Initial Setup

1. **Install Composer**:
   Ensure Composer is installed on your system. You can download it from [getcomposer.org](https://getcomposer.org/).

2. **Create a New PHP Project**:
   Create a new directory for your project and initialize it with Composer.
   ```bash
   mkdir my_php_project
   cd my_php_project
   composer init
    ```

## Add Propel as a Dependency
Add Propel ORM to your `composer.json`.

```json
{
  "require": {
    "propel/propel": "^2.0"
  }
}
```

## Install Dependencies
Run Composer to install Propel.

```bash
composer install
```

## Project Configuration

### Create Propel Configuration File
Create a file named `propel.yaml` at the root of your project. Update it with your database settings.

```yaml
propel:
  database:
    connections:
      default:
        adapter: mysql
        dsn: "mysql:host=localhost;dbname=my_database"
        user: "db_user"
        password: "db_password"
  runtime:
    defaultConnection: default
    connections:
      - default
  generator:
    defaultConnection: default
    connections:
      - default
```

### Database Setup
Create your MySQL database as specified in the `propel.yaml` file.

## Database Schema

Define your database schema in an XML file (e.g., `schema.xml`). Here's an example schema for a simple bookstore:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<database name="bookstore" defaultIdMethod="native">
  <table name="book">
    <column name="id" type="integer" required="true" primaryKey="true" autoIncrement="true" />
    <column name="title" type="varchar" size="255" required="true" />
    <column name="author" type="varchar" size="255" required="true" />
    <column name="publisher" type="varchar" size="255" required="true" />
    <column name="isbn" type="varchar" size="20" required="true" />
  </table>
</database>
```

## Generating Classes

### Generate Model Classes
Use Propel to generate model classes from your schema.

```bash
propel model:build
```

### Generate SQL
Generate the SQL from your schema.

```bash
propel sql:build
```

### Migrate Database
Apply the generated SQL to your database.

```bash
propel sql:insert
```

### Convert Configuration
Convert the configuration to PHP.

```bash
propel config:convert
```

## CRUD Operations

Develop your PHP scripts to perform CRUD operations using the generated model classes.

## Additional Resources

- [Propel ORM Documentation](http://propelorm.org/Documentation/)
- [PHP Official Documentation](https://www.php.net/docs.php)
