<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['tx_dr2okevin_sql_cron'] = array(
    'extension'        => $_EXTKEY,
    'title'            => 'SQL Cron',
    'description'      => 'Runs a mysql query',
    'additionalFields' => 'tx_dr2okevin_sql_cron_addFields'
);
?>