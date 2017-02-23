<?php
/*
 *
 * (c) Ivo Bathke
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivoba\Silex;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use RedBeanPHP\R;

class RedBeanServiceProvider implements ServiceProviderInterface
{

    public function register(Container $app)
    {

        $app['db'] = function () use ($app) {
            $options = array(
                'dsn'      => null,
                'username' => null,
                'password' => null,
                'frozen'   => false,
            );
            if (isset($app['db.options'])) {
                $options = array_replace($options, $app['db.options']);
            }
            R::setup(
                $options['dsn'],
                $options['username'],
                $options['password'],
                $options['frozen']
            );
        };

    }

} 
