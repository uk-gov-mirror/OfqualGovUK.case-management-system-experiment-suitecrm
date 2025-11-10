<?php

namespace SuiteCRM\custom\application\Ext\Api\V8\Controller;

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

use SuiteCRM\custom\application\Ext\Api\V8\Service\OQUserService;
use Api\V8\Controller\BaseController;
use Exception;
use Slim\Http\Request;
use Slim\Http\Response;


class OQUserController extends BaseController
{

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(OQUserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getCurrentUser(Request $request, Response $response, array $args)
    {
        try {
            $jsonResponse = $this->userService->getCurrentUser($request);
            return $this->generateResponse($response, $jsonResponse, 200);
        } catch (Exception $exception) {
            return $this->generateErrorResponse($response, $exception, 400);
        }
    }
}
