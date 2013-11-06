# RedBeanServiceProvider

A [RedBean ORM](http://redbeanphp.com) ServiceProvider for [Silex](http://silex.sensiolabs.org).

## Usage

- Define a db.options array in ```$app``` with *dsn*, *user*, *password* and *frozen* entries.
  Or just pass the array while registering.
- Register the Service:
  ```$app->register(new Ivoba\Silex\RedBeanServiceProvider(), array('db.options' => array(
                                                                                            'dsn' => 'sqlite:/tmp/db.sqlite'
                                                                                        )));```
- Find RedBean under ```$app['db']```

