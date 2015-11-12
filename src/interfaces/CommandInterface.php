<?php

namespace mirocow\telegram\interfaces;

interface CommandInterface
{

    function run(\Zelenin\Telegram\Bot\Type\Update $update);

}