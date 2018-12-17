<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 15.12.2018
 * Time: 16:15
 */
// include FlexForm of plugin Bloglisting of extension EXT:simpleblog
$pluginSignature = 'simpleblog_bloglisting';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:simpleblog/Configuration/FlexForms/FF_Simpleblog_Bloglisting.xml'
);