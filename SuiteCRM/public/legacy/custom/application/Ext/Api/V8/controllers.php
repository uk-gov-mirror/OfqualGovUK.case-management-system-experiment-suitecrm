<?php
require_once $GLOBALS['BASE_DIR'] . '/custom/application/Ext/Api/V8/Controller/OQUserController.php';
require_once $GLOBALS['BASE_DIR'] . '/custom/application/Ext/Api/V8/Service/OQUserService.php';

use Psr\Container\ContainerInterface as Container;
use SuiteCRM\custom\application\Ext\Api\V8\Service\OQUserService;
use SuiteCRM\custom\application\Ext\Api\V8\Controller\OQUserController;

$arr = [
    OQUserController::class => function (Container $container) {
        return new OQUserController($container->get(OQUserService::class));
    },
];

return $arr;
