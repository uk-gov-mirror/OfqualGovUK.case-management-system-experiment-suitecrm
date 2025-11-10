<?php
require_once $GLOBALS['BASE_DIR'] . '/custom/application/Ext/Api/V8/Factory/OQParamsMiddlewareFactory.php';

use Psr\Container\ContainerInterface as Container;
use SuiteCRM\custom\application\Ext\Api\V8\Factory\OQParamsMiddlewareFactory;

return [
    OQParamsMiddlewareFactory::class => function (Container $container): OQParamsMiddlewareFactory {
        return new OQParamsMiddlewareFactory($container);
    },
];
