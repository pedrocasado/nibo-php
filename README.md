# NiboPHP

Simple Nibo api wrapper

### Operations Supported

-   getCustomers
-   getCustomer
-   createCustomer
-   createReceipt
-   createScheduleCredit
-   receiveSchedule

### Install

    composer require pedrocasado/nibo-php

### Example

    use NiboPhp\Nibo;

    $nibo = new Nibo([
        'apiToken' => 'xxx',
        'organizationId' => 'xxx'
    ]);

    $customerUuid = $nibo->createCustomer([
        'name' => 'email',
        'email' => 'email@email.com',
    ]);

    $customers = $nibo->getCustomers();

    $customer = $nibo->getCustomer('uuid');

    $receiptUuid = $nibo->createReceipt([
        "accountId": "string",
        "stakeholderId": "string",
        "categoryId": "string",
        "costCenterId": "string",
        "value": 0.0,
        "date": "string",
        "description": "string",
        "isFlag": true
    ]);

    $uuid = $nibo->receiveSchedule('da977074-7cf1-4dbc-b3f3-25effbb72e49', [
        'accountId' => '0351a02c-d92e-4b80-9cb2-a11badb5e8c3',
        'payingType' => 'close',
        'value' => 200.00,
        'date' => '2020-06-20',
        'identifier' => '2423324323',
    ]);
