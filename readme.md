# RedBeanServiceProvider

A [RedBean ORM](http://redbeanphp.com) ServiceProvider for [Silex](http://silex.sensiolabs.org).

[![Build Status](http://img.shields.io/travis/ivoba/redbean-service-provider.svg)](https://travis-ci.org/ivoba/redbean-service-provider)


## Usage

- Define a db.options array in ```$app``` with *dsn*, *user*, *password* and *frozen* entries.  
  Or just pass the array while registering. see below.
- Register the Service:
  ```$app->register(new Ivoba\Silex\RedBeanServiceProvider(), array('db.options' => array(
                                                                                            'dsn' => 'sqlite:/tmp/db.sqlite'
                                                                                        )));```
- Init RedBean with calling ```$app['db'];```.  
  This you can do in your controller or more general.  
  Then you can access your configured Facade R.  

      use RedBean_Facade as R;
      ...
      $app['db'];
      ...
      $e = R::findAll('table',' ORDER BY date DESC LIMIT 2');


Happy tight coupling ;)

