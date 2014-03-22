<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Newsgallery',
	'Newsgallery'
);


$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['wizznewsgallery_newsgallery'] = 'layout,recursive,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['wizznewsgallery_newsgallery'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('wizznewsgallery_newsgallery', 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/NewsgalleryPlugin.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Newsgallery');

?>