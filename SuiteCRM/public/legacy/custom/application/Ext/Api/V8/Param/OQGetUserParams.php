<?php

namespace SuiteCRM\custom\application\Ext\Api\V8\Param;

use Api\V8\Param\Options as ParamOption;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Api\V8\Param\BaseParam;
use Api\V8\Factory\ValidatorFactory;
use Api\V8\BeanDecorator\BeanManager;

if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

#[\AllowDynamicProperties]
class OQGetUserParams extends BaseParam
{

    public function __construct(
        ValidatorFactory $validatorFactory,
        BeanManager $beanManager
    ) {
        
    }

    /**
     *
     * @param OptionsResolver $resolver
     */
    protected function configureParameters(OptionsResolver $resolver)
    {
        $this->setOptions($resolver, []);
    }
}
