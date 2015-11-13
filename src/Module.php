<?php

namespace mirocow\telegram;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'mirocow\telegram\controllers';

    public $token = '';

    public $commands = [];

    public $unknownCommand = 'mirocow\telegram\commands\UnknownCommand';

    public $defaultMessage = 'mirocow\telegram\commands\DefaultMessage';
    
    public $options = [];

    public function init()
    {
        parent::init();

    }
}
