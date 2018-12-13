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
	'name' => 'Viswa&Devji',
	
	'pagination' => [
		'perPage' => '3',        
    ],

    'Project' => [
		'title' => 'Viswa&Devji',        
    ],

    'Report' => [
      'yes' => 'Returnable',
      'no'  => 'Non Returnable',
      'delivery_note' => 'Delivery Note'
    ],

    'SMS' => [
      'AUTHENTICATION_KEY' => "207123AE91hE13cJ75ac1b73c",
      'SENDER_ID' => "VISWAS",
      'ROUTE' => 4,
      'COUNTRY_CODE' => 91,
    ],
    
    'Date_Format' => "+5 hour +30 minutes",
    'Date-Format' => "d-m-Y",

    'Cat-Img' => " Image - height : 250 , width : 250",
    'Prd-Img-small' => " Image - height : 309 , width : 1024",
    'Prd-Img-large' => " Image - height : 1100 , width : 1024",
];
