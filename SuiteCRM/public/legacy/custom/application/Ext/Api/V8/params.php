<?php

require_once $GLOBALS['BASE_DIR'] . '/custom/application/Ext/Api/V8/Param/OQGetUserParams.php';

use Psr\Container\ContainerInterface as Container;
use SuiteCRM\custom\application\Ext\Api\V8\Param\OQGetUserParams;
use Api\V8\BeanDecorator\BeanManager;
use Api\V8\Factory\ValidatorFactory;
use LoggerManager;

$arr = [
    OQGetUserParams::class => function (Container $container) {

        return new OQGetUserParams(
            $container->get(ValidatorFactory::class),
            $container->get(BeanManager::class)
        );
    },
];

return $arr;
