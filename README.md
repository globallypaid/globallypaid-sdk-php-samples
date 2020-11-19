# GloballyPaid PHP SDK (Example of use)

This is an simple usage of the GLoballyPaid php-sdk and you can use on your own way with any PHP framework or any PHP application.

### Step 1

Download this example

### Step 2

Copy example from zip file into your web server document root

### Step 3

Change `config.php` file with data from your GloballyPaid merchant account

```php
//required config
$config['PublishableApiKey']    = 'PublishableApiKey_here';
$config['AppId']                = 'AppId_here';
$config['SharedSecret']         = 'SharedSecret_here';
$config['Sandbox']              = true;

//optional config
//$config['ApiVersion']          = 'v1'; //default v1
//$config['RequestTimeout']      = 10; //default 30
```

### Step 4

Install latest version from Globally Paid PHP-SDK using composer

```bash
composer require globallypaid/php-sdk
```

### Step 5

Add autoloader in the example files `index.php` and `charge.php`

```php
require_once('vendor/autoload.php');
```

## Enjoy using this service!
