<?php
defined('TYPO3_MODE') || die();

call_user_func(function () {

    /**
     * Plugins
     */
//    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
//        'JkSitepackage',
//        'Pi1',
//        'LLL:EXT:jk_sitepackage/Resources/Private/Language/locallang_be.xlf:plugin.pi1.title'
//    );

    /**
     * Flexforms
     */
//    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['jksitepackage_pi1'] = 'pi_flexform';
//    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
//        'jksitepackage_pi1',
//        'FILE:EXT:jk_sitepackage/Configuration/FlexForms/Flexform.xml'
//    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
        [
            'LLL:EXT:jk_sitepackage/Resources/Private/Language/locallang.xlf:jk_sitepackage_textimage.wizard.title',
            'jk_sitepackage_textimage',
            'content-beside-text-img-centered-right',
        ],
        'textmedia',
        'before'
    );

    $GLOBALS['TCA']['tt_content']['types']['jk_sitepackage_textimage'] = [
        'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;;general,
            layout;Layout,
            bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
            image;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:image_formlabel,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;;access,
    ',
        'columnsOverrides' => [
            'bodytext' => [
                'config' => [
                    'enableRichtext' => true,
                    'richtextConfiguration' => 'jk_sitepackage',
                ],
            ],
            'image' => [
                'config' => [
                    'maxitems' => 1,
                    'minitems' => 1,
                ]
            ]
        ],
    ];

});
