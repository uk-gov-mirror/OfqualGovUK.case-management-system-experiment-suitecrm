<?php

namespace SuiteCRM\custom\application\Ext\Api\V8\Middleware;

use Api\V8\Middleware\ParamsMiddleware;
use Api\V8\Param\BaseParam;
use Exception;
use Slim\Http\Request;
use Api\V8\BeanDecorator\BeanManager;

#[\AllowDynamicProperties]
class OQUserMiddleware extends ParamsMiddleware
{
    /**
     * @var BaseParam
     */
    private $params;

    /**
     * @var BeanManager
     */
    private $beanManager;

    public function __construct(BaseParam $params, BeanManager $beanManager)
    {
        parent::__construct($params, $beanManager);
        $this->params = $params;
        $this->beanManager = $beanManager;
    }

    /**
     * @param Request $request
     */
    protected function setCurrentUserGlobal(Request $request)
    {

        if ($request->hasHeader('X-UserContext')) {
            $user_id = $request->getHeader('X-UserContext')[0];

            $userfac = \BeanFactory::getBean('Users');
            $userlist = $userfac->get_full_list('', "users.remote_user_key='{$user_id}' AND users.deleted=0");
            if (count($userlist) > 0) {
                $user = $userlist[0];
                $real_user_id = $user->id;
                $currentUser = $this->beanManager->getBeanSafe('Users', $real_user_id);
                $GLOBALS['current_user'] = $user;
            } else {
                throw new Exception('User not found');
            }
        } else {
            throw new Exception('X-UserContext header not found');
        }
    }
}
