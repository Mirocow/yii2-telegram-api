<?php

namespace mirocow\telegram;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'mirocow\telegram\controllers';

    public $token = '';

    public $commands = [];

    public function init()
    {
        parent::init();

    }
}
