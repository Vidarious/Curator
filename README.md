# Curator v0.0

#### INSTALLATION

#1 Add the Curator application to your Laravel PSR-4 autoload.

**Modify File**: /laravel/composer.json

```php
    "autoload": {
        "classmap": [
            "database"
        ],
        "psr-4": {
            "App\\": "app/",
            "Curator\\": "vendor/ila/curator/src/Curator/"
        }
    },
```

**Run Command**

```sh
~/laravel$ composer dump-autoload
```
