[TOC]

# Installation instructions

Clone repository:

```Shell
git clone https://nikitakiselev@bitbucket.org/nikitakiselev/php-programmer-test.git
cd php-programmer-test
```

# Array swap sort

```Shell
cd array-swap-sort
php -S localhost:3000
```

Locate to `http://localhost:3000` in your browser.

# Friends SQL

Change folder

```Shell
cd friends_sql
```

Create new database and run sql from database.sql for create database schema:

```Shell
mysql -u root -e "create database IF NOT EXISTS php_programmer_test;";
mysql -u root php_programmer_test < database.sql
```

Run SQL scripts from  queries.sql

```Shell
mysql -u root php_programmer_test < queries.sql
```

# Html page parser

```Shell
cd html-page-parser
composer install
php -S localhost:8888 -t public/
```

Locate to [http://localhost:8888](http://localhost:8888) in your browser.

The default url for parse was defined in application config file `config/app.php`

```php
return [

    /*
     * Default url for parsing
     */
    'default_url' => 'https://nikitakiselev.ru',

    /**
     * Default parsing content type
     *
     * Supported: "html", "bbcode"
     * Default: "html"
     */
    'default_content_type' => 'html',
    
];
```

You can can change them or pass your own custom parameters to the script via GET parameters:

**url** - url for parsing content
**type** - (optional) parser name, which parse the content

## Browser

I've prepared a some examples for testing from browser:

**HTML**
http://localhost:8888?site=https://nikitakiselev.ru

**XML**
http://localhost:8888?site=https://nikitakiselev.ru/sitemap.xml

**BBCODE**
http://localhost:8888?site=https://nikitakiselev.ru/sitemap.xml&type=bbcode

## Console

You can run application from the command line, like this:

```Shell
php parser [url] [parser]
```

**url** - url for parsing content

**parser** - parser name, which parse the content

```Shell
php parser https://nikitakiselev.ru
php parser https://nikitakiselev.ru/sitemap.xml html
php parser https://nikitakiselev.ru/example.bbcode bbcode
```