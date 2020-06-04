# rldatixs
RLDatix's Project Code Test 💣

## Test Description
```
PHP Test
Note : Following test is to see your code skills along with coding standards and way of thinking.

Get weather information from https://openweathermap.org/appid
Get weather data for some city and store it in a DB.
Demonstrate your knowledge in
Oops
Dependency Injection


In the above mentioned project, add another controller which will call another class.
Class should have a function which will return a boolean value. Function accepts a single string parameter. Function should be able to detect if the string provided is a Palindrome word or not.

A palindrome is a word, phrase, number or sequence of words that reads the same backward as forward. For example anna, civic, nitin,1223221 etc.

In the above mentioned project, add another controller which will call another class.
Class should have a function which accepts a single string parameter and will return a string.
Function should be able to reverse any string or integer provided as input, BUT WITHOUT USING ANY INBUILT PHP REVERSE FUNCTION.
```

## Prerequisite 

Import the mysql Database

```mysql
mysql -h localhost -u root -p rldatix_db < rldatix_db.sql
```

## Run application

Install composer dependencies
```bash
composer install
```

Composer dump-autoload
```bash
composer dump-autoload
```

To show the available Terminal Command
```php
> php index.php
```

### Fetch Weather
Fetch weather details from the API & store it in DB.
```bash
> php index.php rld:fetch-weather <city name>
```

### Show Weather
Show weather details from the DB.
```bash
> php index.php rld:show-weather <city name>
```

### Palindrome
Show weather details from the DB.
```bash
> php index.php rld:find-palindrom <palindrome string>
```

### Reverse Word
Show weather details from the DB.
```bash
> php index.php rld:everse-word <string>
```

## Test application
```bash
> ./vendor/phpunit/phpunit/phpunit test
```