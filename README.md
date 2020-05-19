# NiboPHP

Simple Nibo api wrapper

### Operations Supported

-   getCustomers
-   getCustomer
-   createCustomer
-   createReceipt
-   createScheduleCredit

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
