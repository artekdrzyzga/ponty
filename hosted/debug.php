<?php

/**
 Notes

 * Include the main payzone files, and set the base variables
 * This file includes a the demo-admin.php file, which contains 
 * the functionality normally sitting with the admin side of
 * the cart / order system
 *
 * 1) The options / config settings - these are hard coded 
 *    vars to be passed to the $PayzoneHelper object, these would
 *    usually be saved in the admin system for the card / order system
 * 2) A transaction saving dummy function, with a switch statement
 *    for the various transaction outcomes, the cart / order system
 *    can be called from this function to record / process the order
 */
include_once('incs/payzone.php');
?>
<table class='payzone-debug' style='text-align:left;'>
    <tr>
        <th>Debug Mode Active</th>
        <td><?= $PayzoneDebug::BoolToString($PayzoneHelper::getDebugMode()) ?></td>
    </tr>
    <tr>
        <th>Module version</th>
        <td><?= $PayzoneDebug::getVersionInfo() ?></td>
    </tr>
    <tr>
        <th>Server Info</th>
        <td><?= $PayzoneDebug::getServerInfo() ?></td>
    </tr>
    <tr>
        <th>PHP Version</th>
        <td><?= $PayzoneDebug::getPHPVersion() ?></td>
    </tr>
    <tr>
        <th>Server DateTime</th>
        <td><?= $PayzoneDebug::getServerDateTime() ?></td>
    </tr>
    <tr>
        <th>Curl Enabled</th>
        <td><?= $PayzoneDebug::getCurlEnabled() ?></td>
    </tr>
    <tr>
        <th>SOAP Enabled</th>
        <td><?= $PayzoneDebug::getSoapEnabled() ?></td>
    </tr>
    <tr>
        <th>Port 4430 open</th>
        <td><?= $PayzoneDebug::runPortCheck() ?></td>
    </tr>
    <tr>
        <th>Merchant Details Valid</th>
        <td><?= $PayzoneDebug::runMerchantDetailsCheck() ?></td>
    </tr>
    <tr>
        <th>SSL / HTTPS</th>
        <td><?= $PayzoneDebug::getSslHttps() ?></td>
    </tr>
    <tr>
        <th>Local Host</th>
        <td><?= $PayzoneDebug::getIsLocal() ?></td>
    </tr>
    <tr>
        <th>Display Errors (ini)</th>
        <td><?= $PayzoneDebug::getDisplayErrors() ?></td>
    </tr>
    <tr>
        <th>Log Errors (ini)</th>
        <td><?= $PayzoneDebug::getLogErrors() ?></td>
    </tr>
    <tr>
        <th>Custom Logs</th>
        <td><?= $PayzoneDebug::getCustomErrors() ?></td>
    </tr>
 
</table>
