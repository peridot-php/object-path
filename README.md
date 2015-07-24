# ObjectPath [![Build Status](https://travis-ci.org/peridot-php/object-path.svg?branch=master)](https://travis-ci.org/peridot-php/object-path)

Allows traversal of objects and arrays with a simple string syntax. Extracted from
Peridot's matcher library: [Leo](https://github.com/peridot-php/leo).

## Usage

```php
$data = [
  'name' => 'Brian',
  'hobbies' => [
    'reading',
    'programming',
    'lion taming'  
  ],
  'address' => [
    'street' => '1234 Lane',
    'zip' => '12345'  
  ]
];

use Peridot\ObjectPath\ObjectPath;

$path = new ObjectPath($data);
$reading = $path->get('hobbies[0]');
$zip = $path->get('address[zip]');

// the result of get() is an ObjectPathValue instance
$value = $reading->getPropertyValue();

// The syntax also works for objects and nested structures

$data = new stdClass();

$data->name = 'Brian';
$data->address = new stdClass();
$data->address->zip = '12345';

$hobby = new stdClass();
$hobby->name = 'reading';
$hobby->style = 'relaxing';
$data->hobbies = [$hobby];

$path = new ObjectPath($data);
$name = $path->get('name');
$zip = $path->get('address->zip');
$reading = $path->get('hobbies[0]->name');
```

## Tests

```
$ composer install
$ vendor/bin/peridot specs/
```
