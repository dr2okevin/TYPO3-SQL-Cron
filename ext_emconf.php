<?php
$EM_CONF[$_EXTKEY] = array(
	'title' => 'SQL Cron',
	'description' => 'Eigene SQL Befehle über den TYPO3 Planer ausführen',
	'category' => 'backend',
	'author' => 'Kevin Quiatkowski',
	'author_email' => 'kevin@quiatkowski.net',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
         'scheduler' => '4.7.0-0.0.0',
        ),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>