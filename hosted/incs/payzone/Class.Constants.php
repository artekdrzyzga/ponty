<?php /**
* Payzone Payment Gateway
* ========================================
* Web:   http://payzone.co.uk
* Email:  online@payzone.com
* Authors: Payzone, Keith Rigby
*/
namespace Payzone;


if (count(get_included_files()) ==1) {
    exit("Direct access not permitted.");
}

/**
 * [TPCONSTS]
 */
class TPCONSTS
{
  const COREVERSION     = "1.0.0";
  const VERSION         = "2.0.0";
  const VGUID           = "b19502ac-a6c3-4881-8b78-9a98582cdcb9";
  const GATEWAYURL      = "https://gw1.tponlinepayments2.com:4430";
  const MAPIURL         = "https://mapi.takepayments.com/umbraco/api/ModulesApi/Version?id=";

}

/**
 * [RESPONSE_CODE]
 */
class RESPONSE_CODE
{
  const SUCCESSFUL         = 0;
  const THREEDREQUIRED    =3;
  const REFERRED          = 4;
  const DECLINED          = 5;
  const DUPLICATE         = 20;
  const ERROR             = 30;
}

/**
 * [TRANSACTION_TYPE constants for transaction type selection]
 */
class TRANSACTION_TYPE
{
  const SALE            = 'SALE';
  const PREAUTH         = 'PREAUTH';
    const REFUND         = 'REFUND';
}
/**
 * [INTEGRATION_TYPE constants for populating fields / queries]
 */
class INTEGRATION_TYPE
{
  const HOSTED          = 'hosted';
  const DIRECT          = 'direct';
  const TRANSPARENT     = 'transparent';
}
/**
 * [HASH_METHOD constants for populating fields / queries]
 */
class HASH_METHOD
{
  const SHA1        = 'SHA1';
  const MD5         = 'MD5';
  const HMACSHA1    = 'HMACSHA1';
  const HMACMD5     = 'HMACMD5';
  const HMACSHA256 = 'HMACSHA256';
  const HMACSHA512 = 'HMACSHA512';
}
/**
 * [RESULT_DELIVERY_METHOD constants for populating fields / queries]
 */
class RESULT_DELIVERY_METHOD
{
  const POST           = 'POST';
  const SERVER    = 'SERVER';
  const SERVER_PULL    = 'SERVER_PULL';
}
/**
 * [PAYZONE_RESPONSE_CSS constants for human readable response code mapping]
 */