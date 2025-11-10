<?php

namespace SuiteCRM\custom\application\Ext\Api\V8\Service;

use Api\V8\BeanDecorator\BeanManager;
use Api\V8\JsonApi\Helper\AttributeObjectHelper;
use Api\V8\JsonApi\Helper\RelationshipObjectHelper;
use Api\V8\JsonApi\Response\AttributeResponse;
use Api\V8\JsonApi\Response\DataResponse;
use Api\V8\JsonApi\Response\DocumentResponse;
use Slim\Http\Request;

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}


#[\AllowDynamicProperties]
class OQUserService
{


    /**
     * @var BeanManager
     */
    protected $beanManager;

    /**
     * @var AttributeObjectHelper
     */
    protected $attributeHelper;

    /**
     * @var RelationshipObjectHelper
     */
    protected $relationshipHelper;

    /**
     * @param BeanManager $beanManager
     */
    public function __construct(
        BeanManager $beanManager,
        AttributeObjectHelper $attributeHelper,
        RelationshipObjectHelper $relationshipHelper
    ) {
        $this->beanManager = $beanManager;
        $this->attributeHelper = $attributeHelper;
        $this->relationshipHelper = $relationshipHelper;
    }

    /**
     *
     * @param Request $request
     * @return DocumentResponse
     */
    public function getCurrentUser(Request $request)
    {


        $currentUser = $GLOBALS['current_user'];

        $currentUserData = $currentUser->toArray();
        unset($currentUserData['user_hash']);

        $dataResponse = new DataResponse($currentUser->getObjectName(), $currentUser->id);
        $attributeResponse = new AttributeResponse($currentUserData);
        $dataResponse->setAttributes($attributeResponse);
        $dataResponse->setRelationships($this->relationshipHelper->getRelationships($currentUser, $request->getUri()->getPath()));

        $response = new DocumentResponse();
        $response->setData($dataResponse);
        return $response;
    }
}
