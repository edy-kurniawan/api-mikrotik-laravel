<?php

return [

    'host' => env('ROUTEROS_HOST', ''),
    'user' => env('ROUTEROS_USER', ''),
    'pass' => env('ROUTEROS_PASS', ''),
    'port' => intval(env('ROUTEROS_PORT', '')),

];
