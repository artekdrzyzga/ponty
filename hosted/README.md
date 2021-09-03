# Takepayments Payment Gateway Bespoke Integration - V2.0.0

## Getting Started

These code files are designed to allow customers / web developers to integrate a pay page / payment gateway  with a bespoke shopping cart.

## Prerequisites

Before you can integrate with the Takepayments payment gateway, you will need to ensure that you have access to the below:

* Access To The Merchant Management System (MMS) – please check that you have access to the MMS. A merchant super user will have been automatically created when the
account was initially created – the details of this account will have been emailed to the account owner. We recommend that a dedicated MMS User account be created for the
developer – this has to be done by the account owner, and can be done from the Account Admin | User Admin page in the MMS. The MMS also has useful resources for the
developer, and the transaction reporting section will allow the developer to view any transactions that they process as part of the integration testing. Please note – the MMS User account details are completely separate from the Gateway Account details.
* Latest Integration Documents – please ensure that you have the latest version of the integration documents, which are available to download from the Support | Downloads
section in the MMS.
* Test Gateway Account Credentials – on registration a test Gateway Account will have been created automatically. Details of this account would have been emailed to the account owner. Test Gateway Accounts run on exactly the same system as production Gateway Accounts, and are designed to mimic production accounts precisely. We recommend that merchants perform their integrations against their test Gateway Account. Please note – the Gateway Account details are completely separate from the MMS User account details.
* Additional Account Information – if the Hosted Payment Form or Transparent Redirect integration method is selected, then the developer will require additional account details – namely, the Pre Shared Key, and elected Hash Method. These details can be found in the Account Admin | Account Settings page of the MMS. If you have created your developer their own MMS User account, then they should be able to access these details directly.
* Test Card Document – a test Gateway Account will only work with the test card numbers detailed in this document (conversely, a production Gateway Account will only work with real card numbers). This document is available to download from the Support |Downloads section of the MMS.


## Customisation

### Admin Settings
A demo admin file has been created, in normal integration this would be replaced by the CMS / Cart / Platform admin system to store and provide the details (i.e. Merchant ID) for demo purposes these can be hard coded.
This file is locaated at ./incs/demo-admin.php

### Cart
A demo cart file has been created, in normal integration this would be replaced by the standard cart to provide the required information, the rest of the code expects the variables defined in this file so these will need to be set from the information available in the module.
This file is locaated at ./incs/demo-cart.php


## Integration Methods

### Direct / API
Direct/API processing allows you to keep your customer on your site throughout the entire checkout process, providing a much smoother customer payment experience. This method requires your website to have an SSL certificate.

### Hosted Payment Form
We can provide a secure payment form which the customer is redirected to during the checkout process. Meaning the customer completes their order on our system and is redirected back with the results of the transaction. This method is generally used if the shopping cart being used on the site doesn’t support the Direct/API integration method, or there is no SSL Certificate in place.

### Transparent Redirect
This method allows your system to appear to keep the customer on it during the checkout process, but the card details don’t actually touch the merchant’s system – they get posted directly across to the secure payment system. This solution gives the appearance and experience of the Direct/API method for those who don’t have an SSL Certificate in place.

All of the above methods demonstrate how to post the transactional data across to the payment page in a secure manner. The transaction data MUST be protected as it is being delivered to the payment form via the customer's browser. The data is protected by the use of Hashing. Hashing is used to produce a unique "signature" for the data being passed (it is generated using not only the data being transmitted, but also secret data that is not transmitted, so the fraudster cannot recreate the hash digest with the data that is passed via their browser). The hash signature is then re-calculated on receipt of the transmitted data, and if it does not match the hash signature that was transmitted with the data, then the data has been tampered with, and the transaction will stop with an error message. The same process (in reverse) should be carried out by this site on receipt of the transaction results.

The worst kinds of customer tampering could be lowering the transaction price (say from £100.00 down to £1.00), or making a failed transaction look like an authorised one. This is called a "man-in-the- middle" attack.

## Authors

* **Keith Rigby** - *Takepayments Development* -
[Takepayments.co.uk](https://Takepayments.co.uk/) |  [keithrigby.co.uk](https://keithrigby.co.uk/)
