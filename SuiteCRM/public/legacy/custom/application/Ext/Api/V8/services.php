<?php
require_once $GLOBALS['BASE_DIR'] . '/custom/application/Ext/Api/V8/Service/OQUserService.php';

use Psr\Container\ContainerInterface as Container;
use SuiteCRM\custom\application\Ext\Api\V8\Service\OQUserService;
use Api\V8\BeanDecorator\BeanManager;
use Api\V8\JsonApi\Helper\AttributeObjectHelper;
use Api\V8\JsonApi\Helper\RelationshipObjectHelper;

return [
    OQUserService::class => function (Container $container) {
        return new OQUserService(
            $container->get(BeanManager::class),
            $container->get(AttributeObjectHelper::class),
            $container->get(RelationshipObjectHelper::class)
        );
    },
];
