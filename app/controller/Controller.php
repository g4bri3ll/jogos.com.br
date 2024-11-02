<?php

namespace app\controller;

use config\RequestController;

abstract class Controller extends RequestController
{
    public function view()
    {
        echo 'caiu no view';
    }
}
