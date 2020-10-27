## PHP Variable Checking Expressions

### Usage
```php
$array = [];
check_against($array, ['isset', 'notempty', 'array']);
// bool(false)

$array = ['hi'];
check_against($array, ['isset', 'notempty', 'array']);
// bool(true)

class MyClass {}
$instance = new MyClass();
check_against($instance, ['notempty', 'instanceof'], 'MyClass');
// bool(true)
```

Checks array must contain at least one of
`isset, empty, notempty, bool (or boolean), string, int, array, instanceof, countable, iterable, writeable (or writable), double, float, long, null, numeric, object, executable`