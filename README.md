### rockschtar/wordpress-notices

### Description

WordPress
[Must Use Plugin](https://codex.wordpress.org/Must_Use_Plugins) that
helps to display notices in WordPress admin area. Developed for usage
with composer based WordPress projects
([roots/bedrock](https://github.com/roots/bedrock) or
[johnpbloch/wordpress](https://github.com/johnpbloch/wordpress)).

### Requirements

  - PHP 8.0+
  - [Composer](https://getcomposer.org/) to install

### Install

```
composer require rockschtar/wordpress-notices
```

### License

rockschtar/wordpress-notices is open source and released under MIT
license. See LICENSE.md file for more info.

### Usage

**php**
```php
add_action('admin_init', function() {
    add_notice_success('Hello World');
});
```

**javascript**
```javascript
RSAdminNotices.addError('This is a error');
RSAdminNotices.addSuccess('This is a success');
RSAdminNotices.addInfo('This is a info');
RSAdminNotices.addWarning('This is a warning');
```
