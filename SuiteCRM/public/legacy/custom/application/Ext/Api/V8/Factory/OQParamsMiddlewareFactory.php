<?php

namespace SuiteCRM\custom\application\Ext\Api\V8\Factory;

require_once $GLOBALS['BASE_DIR'] . '/custom/application/Ext/Api/V8/Middleware/OQUserMiddleware.php';
require_once $GLOBALS['BASE_DIR'] . '/custom/application/Ext/Api/V8/Param/OQGetUserParams.php';



use SuiteCRM\custom\application\Ext\Api\V8\Middleware\OQUserMiddleware;
use Psr\Container\ContainerInterface as Container;
use Slim\Http\Request;
use Slim\Http\Response;
use Api\V8\BeanDecorator\BeanManager;
use SuiteCRM\custom\application\Ext\Api\V8\Param\OQGetUserParams;

#[\AllowDynamicProperties]
class OQParamsMiddlewareFactory
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $containerId
     *
     * @return callable
     */
    public function bind($containerId)
    {
        $container = $this->container;

        return function (Request $request, Response $response, callable $next) use ($containerId, $container) {
            $paramMiddleware = new OQUserMiddleware($container->get($containerId), $container->get(BeanManager::class));

            return $paramMiddleware($request, $response, $next);
        };
    }
}
