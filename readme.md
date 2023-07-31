## Curl Wrapper 0.1.2

##### Требования:
+ `PHP >= 8.0`
+ `ext-curl`

##### Установка:
```
composer require mnlnk/curl-wrapper
```

##### Примеры:
```php
use Manuylenko\CurlWrapper\Curl;

$curl = new Curl('https://google.com');

$curl->setOptions([
    CURLOPT_RETURNTRANSFER => true
]);

$response = $curl->exec();

echo $response;
```
