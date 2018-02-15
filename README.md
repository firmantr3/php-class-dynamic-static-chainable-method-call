## PHP Class Experiment

a PHP class that its methods can be called statically or dynamically and chainable, for example:

```php
print_r(
    \App\Firman::setName('Fatih')->setEmail('fatih@gmail.com')::reset()->get()
);
```
