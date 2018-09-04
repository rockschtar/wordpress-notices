# WordPress Admin Notices

This library helps to display notices in wordpress admin area.

### Prerequisites

* PHP>=7.1
* roots/bedrock based project

### Usage
plugin.php
```php
NoticeController::init();
```

somewhere in your plugin code (example)
```php
add_action('admin_init', function() {
    add_notice_success('Hello World');
});
```