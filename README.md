## RockitModules-invoice


- publish all files
'php artisan vendor:publish --provider="Rockitworks\Documents\ServiceProvider'

- edit config
'/config/invoice'

- edit views
'/resources/views/vendor/rockitworks/invoice/'

#Example

```
$invoice = \RockitInvoice::init()
    ->setSenderDetails([
        'email' => 'admin@rockit.works',
        'logo' => 'https://assets.laracasts.com/images/logo.svg',
        'name' => 'Rockit Works',
        'address' => 'Flight Forum 3509',
        'postal' => '5657DW',
        'city' => 'Eindhoven',
        'bank_account_name' => 'Rockit Works B.V.',
        'bank_account_number' => 'NL12BUNQ012345678',

    ])
    ->setReceiverDetails([
        'email' => 'admin@rockit.works',
        'name' => 'Rockit Works',
        'address' => 'Flight Forum 3509',
        'postal' => '5657DW',
        'city' => 'Eindhoven'
    ])
    ->setInvoiceNumber('0001')
    ->setInvoiceDate(now()->addDays(2));
```