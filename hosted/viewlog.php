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
        <th>Custom Logs</th>
        <td><?= $PayzoneDebug::getCustomErrors() ?></td>
    </tr>
    <tr>
        <th colspan="2"><?= $PayzoneDebug::getCustomLogs() ?></th>
    </tr>
</table>

