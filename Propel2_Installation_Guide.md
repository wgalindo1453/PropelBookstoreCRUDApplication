
# Propel2 Installation and Usage Guide

Propel2 is an open-source Object-Relational Mapping (ORM) for PHP, known for its ease of use and robust features. This guide covers the installation process, setup, and basic usage.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
  - [Via Composer](#via-composer)
  - [Via Git](#via-git)
- [Propel Directory Structure](#propel-directory-structure)
- [Testing Propel Installation](#testing-propel-installation)
- [Troubleshooting](#troubleshooting)
- [Contributing to Propel](#contributing-to-propel)
- [License](#license)

## Prerequisites

To use Propel, you need:
- PHP 7.4 or newer, with the DOM (libxml2) module enabled.
- A supported database (MySQL, MS SQL Server, PostgreSQL, SQLite, Oracle).
- Propel uses some Symfony2 components.

## Installation

### Via Composer

We recommend using Composer to manage your project's dependencies. To install Propel via Composer:

1. Create a `composer.json` file at the root of your project with the following content:
    ```json
    {
        "require": {
            "propel/propel": "~2.0@beta"
        }
    }
    ```
2. Download Composer:
    ```bash
    wget http://getcomposer.org/composer.phar
    # Or, if you don't have wget:
    curl -s http://getcomposer.org/installer | php
    ```
3. Install dependencies:
    ```bash
    php composer.phar install
    ```

### Via Git

Alternatively, you can set up Propel using Git:
```bash
git clone git://github.com/propelorm/Propel2 vendor/propel
# To update Propel later:
cd myproject/vendor/propel
git pull
```

## Propel Directory Structure

- `bin`: Scripts for Propel command line tool.
- `features`: Tests written with the Behat framework.
- `resources`: Files such as database XSD or DTD.
- `src`: The Propel source code.
- `tests`: Propel unit tests.

## Testing Propel Installation

To test if Propel is installed correctly:
```bash
cd myproject
vendor/bin/propel
```

This command should output the Propel version, available options, and commands.

## Troubleshooting

If you encounter issues with installation, consult the Propel documentation or ask for help in the Propel community.

## Contributing to Propel

Contributions are welcome. Fork the repository, make changes, and submit a pull request. Ensure you include unit tests for your changes.

## License

Propel is released under the MIT License. For more details, see the LICENSE file in the repository.
