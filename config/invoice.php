<?php

// Config
return [

	// Enable invoice generation
	'enabled' => true,

    'enable_modelEntry' => true,

    'confirmation_mail' => [
        'enabled' => true,
        'cc' => [],
        'bcc' => [],
    ],

    'admin_mail' => [
        'enabled' => true,
        'cc' => [],
        'bcc' => [],
    ],    

	'sender_details' => [
        'logo' => 'https://www.adaptivewfs.com/wp-content/uploads/2020/07/logo-placeholder-image-300x300.png.webp',
        'email' => 'sjoerd@rockit.works',
        'name' => 'Sjoerd van Bergen',
        'address' => 'Flight Forum 3509',
        'postal' => '5657DW',
        'city' => 'Eindhoven',
        'bank_account_name' => 'Rockit Works B.V.',
        'bank_account_number' => 'NL12BUNQ01245678',        
        'kvk' => '123456',
        'btw' => '123456'
	],
    'receiver_details' => [
        'email' => 'info@rockit.works',
        'name' => 'Sjoerd van Bergen',
        'address' => 'Flight Forum 3509',
        'postal' => '5657DW',
        'city' => 'Eindhoven',
        'kvk' => '123456',
        'btw' => '123456'
    ],

    'invoice_details' => [
        'pay_within_days' => 28,
    ],

    'file' => [
        'file_path' => storage_path('invoices')
    ]
];