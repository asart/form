## Как развернуть проект
Создайте фаил ```config/db.php``` с актуальными данными для подключения, например:
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

создайте фаил ```config/params.php``` 
```php
return [

];
```