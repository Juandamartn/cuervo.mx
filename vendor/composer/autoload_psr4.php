<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Psr\\Http\\Message\\' => array($vendorDir . '/psr/http-message/src'),
    'Minishlink\\WebPush\\' => array($vendorDir . '/minishlink/web-push/src'),
    'Jose\\Component\\Signature\\Algorithm\\' => array($vendorDir . '/web-token/jwt-signature-algorithm-ecdsa', $vendorDir . '/web-token/jwt-signature-algorithm-eddsa', $vendorDir . '/web-token/jwt-signature-algorithm-hmac', $vendorDir . '/web-token/jwt-signature-algorithm-none', $vendorDir . '/web-token/jwt-signature-algorithm-rsa'),
    'Jose\\Component\\Signature\\' => array($vendorDir . '/web-token/jwt-signature'),
    'Jose\\Component\\KeyManagement\\' => array($vendorDir . '/web-token/jwt-key-mgmt'),
    'Jose\\Component\\Core\\Util\\Ecc\\' => array($vendorDir . '/web-token/jwt-util-ecc'),
    'Jose\\Component\\Core\\' => array($vendorDir . '/web-token/jwt-core'),
    'GuzzleHttp\\Psr7\\' => array($vendorDir . '/guzzlehttp/psr7/src'),
    'GuzzleHttp\\Promise\\' => array($vendorDir . '/guzzlehttp/promises/src'),
    'GuzzleHttp\\' => array($vendorDir . '/guzzlehttp/guzzle/src'),
    'FG\\' => array($vendorDir . '/fgrosse/phpasn1/lib'),
    'Base64Url\\' => array($vendorDir . '/spomky-labs/base64url/src'),
);