<?php
use Illuminate\Support\Facades\Config;
return [
    /*
    |--------------------------------------------------------------------------
    | Pagination Limit
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */
    'TIMESTAMP' => time(),
    'SYMBOL' => [
        'PLUS' => "+",
        'MINUS' => "-",
    ],
    'EXTENSION' => [
        'PNG' => 'png',
        'GIF' => 'gif',
        'BMP' => 'bmp',         
    ],
    'SIZE' => [
        'QUALITY' => 90,
    ],
    'NUMBER' => [
        'ZERO' => 0,
        'ONE' => 1,
        'TWO' => 2,
        'THREE' => 3,
        'FOUR' => 4,
        'FIVE' => 5,
        'SIX' => 6,
        'SEVEN' => 7,
        'EIGHT' => 8,
        'NINE' => 9,
        'TEN' => 10,
        'NINETYNINE' => 99,
    ],
    'TEXT' => [
        'ZERO' => 'Zero',
        'ONE' => 'One',
        'TWO' => 'Two',
        'THREE' => 'Three',
        'FOUR' => 'Four', 
        'FIVE' => 'Five', 
        'SIX' => 'Six', 
        'YES' => 'yes',
        'NO' => 'no',        
    ],
    'EMPTY' => "N/A",
    'NORECORDS' => "No Records",
    'HOLIDAY' => "Holi day",
    'AUTOINCREMENT' => [
        'DEFAULT' => '001',
        'D-ZERO' => '00',
    ],
    'VISWA' => [
        'SALE' => 'SALE',
        'USER' => 'User',
        'ADMIN' => 'Admin',
        'ANSWER' => 'Answer',
        'STAFFANSWER' => 'Staff Answer',
        'SMS' => [
            'CONTENT' => 'VDD-VM'
        ],
        'NOTIFICATION' => 'Notification',
    ],
    'FORMAT-CODE' => [
        'SALE_CODE' => 'SAL',
        'ANS_CODE' => 'ANS',
        'USER_CODE' => 'ZUR',
    ],    

];        