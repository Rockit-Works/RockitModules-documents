## RockitModules-invoice


- publish all files
'php artisan vendor:publish'

- edit config
'/config/invoice'

- edit views
'/resources/views/vendor/rockitworks/invoice/'

#Example

```
$invoice = \RockitInvoice::init()
    ->setSenderDetails([
        'email' => 'sjoerd@rockit.works',
        'logo' => 'https://assets.laracasts.com/images/logo.svg',
        'name' => 'Sjoerd van Bergen',
        'address' => 'Straat 28',
        'postal' => '5657DW',
        'city' => 'Eindhoven',
        'bank_account_name' => 'Rockit Works B.V.',
        'bank_account_number' => 'NL12BUNQ01245678',

    ])
    ->setReceiverDetails([
        'email' => 'sjoerd@rockit.works',
        'name' => 'Rockit Works',
        'address' => 'Flight Forum 3509',
        'postal' => '5657DW',
        'city' => 'Eindhoven'
    ])
    ->setInvoiceNumber('0001')
    ->setInvoiceDate(now()->addDays(2));
```