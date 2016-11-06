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

#2. Register Curator's ServiceProvider into Laravel.

**Modify File**: /laravel/config/app.php

```php
        /*
         * Package Service Providers...
         */

        Curator\Providers\CuratorServiceProvider::class,
```

#3. Initialize the Curator.

**Run Command**

```sh
~/laravel$ php artisan curator:init
```

Initializing the Curator application will:
- Remove Laravel's default Auth migrations.
- Add Curator's migrations.
- Run Curator's migrations.

**Options**

```sh
-- force : When copying files Curator will override any existing Curator files.
```
