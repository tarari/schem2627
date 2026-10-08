<?php

use App\Controllers\HomeController;

return
    [
        ['path'=>'/',
        'method'=>'GET',
        'handler'=>[HomeController::class,'index']
        ],

    ];