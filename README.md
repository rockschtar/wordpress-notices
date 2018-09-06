![MIT](https://img.shields.io/dub/l/vibe-d.svg)
![PHP](https://img.shields.io/travis/php-v/symfony/symfony.svg)

# WordPress Admin Notices

This library/mu-plugin helps to display notices in wordpress admin area.

### Prerequisites

* PHP>=7.1
* [roots/bedrock](https://roots.io/bedrock/) based project

### Usage
somewhere in your plugin code (example)
```php
add_action('admin_init', function() {
    add_notice_success('Hello World');
});
```