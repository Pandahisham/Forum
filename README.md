# Forum

A basic forum system for Laravel 5

## Hierarchy

    Section
        Topic
            Comment

* Sections make up the forum index. Sections can have relationships with one another - sections can have children or be parents.  Sections contain topics.
* Topics belong to sections and contain comments.  They serve to contain comments and steer the direction of conversation into a specific field.
* Comments contribute to the topics that they are posted in.

## Usage

### Creating Sections

To create a root section, which are usually categories to other sections, you use the `Forum::createRootSection($title, $description = "", $weight = 0)` method.
For example, if you wanted to create a category for programming languages, you might do the following:

```php
    $section = Forum::createRootSection("Programming Languages");
```

To create children to a particular section, you use the `$section->createChild($title, $description = "", $weight = 0)` method.

```php
    $php = $section->createChild("PHP", "Talk about the PHP language");
    $cpp = $section->createChild("C++", "Talk about the C++ language", 2);
    $java = $section->createChild("Java", "Talk about the Java language", 1);
```

### Creating Topics

To create a topic, you use the `$section->createTopic($user, $title, $content)` method.

```php
   $topic = $php->createTopic(Auth::user(), "Laravel is Awesome", "Check it out!");
```

This will automatically create the first comment of the topic.  In this case it will be `Check it out!`.

### Creating Comments

To create a comment, you use the `$topic->createComment($user, $content)` method.

```php
    $comment = $topic->createComment(Auth::user(), "I completely agree!");
```

### Aftermath

The end result would look something like this:

    Programming Languages
        PHP
            Laravel is Awesome
                Check it out!
                I completely agree!
        Java
        C++

### Example

In many cases, you'll have your forum index set up to be all of your categories.

```php
    $index = Forum::index();
    
    foreach($index as $category) {
        echo "<h1>" . $category->getTitle() . "</h1>";
        foreach($category->children as $section) {
            echo "<h2>" . $section->getTitle() . "</h2>";
        }
        echo "<hr />";
        foreach($section->topics as $topic) {
            echo "<p>" . $topic->getTitle() . "</p>";
        }
    }
```

### Content Parsers

The content of comments can be parsed into display content using parsers such as Markdown.
To create a parser you need to implement the `\Qrokodial\Forum\Contract\ParserContract` contract and change the `parser` value under your `comments` array in your config file to your implementation.
By default, the parser is set to `\Qrokodial\Forum\DoNothingParser`, which, as you might have guessed, does nothing to your content.

## Requirements

* Composer
* Laravel 5
* PHP >= 5.4

## Installation

* Require the package in your `composer.json` file:
```
    "require": {
        "qrokodial/forum": "~1.0"
    }
```
* Run Composer command `composer update` from the terminal in your root project directory
* Add `"\Qrokodial\Forum\Laravel\ForumServiceProvider",` to the service provider array in your `config/app.php` file
* Pull the configuration file by running `php artisan publish:config qrokodial/forum` from your terminal
* Review your configuration file at `config/packages/qrokodial/forum/config.php` and make changes if necessary