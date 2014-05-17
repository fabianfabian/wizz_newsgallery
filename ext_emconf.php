<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'News Gallery',
	'description' => 'Show a gallery of images collected from news items',
	'category' => 'plugin',
	'author' => 'Fabian Lachman',
	'author_email' => 'flachman@wizzbit.nl',
	'author_company' => 'Wizzbit',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '0.1.1',
	'constraints' => array(
		'depends' => array(
			'news' => '2.1.0',
			'extbase' => '6.1.0-6.2.999',
			'fluid' => '6.1.0-6.2.999',
            'typo3' => '6.1.0-6.2.999',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>