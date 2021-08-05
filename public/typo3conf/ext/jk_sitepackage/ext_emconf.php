<?php

/**
 * Extension Manager/Repository config file for ext "jk_sitepackage".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'jk_sitepackage',
    'description' => 'jk_sitepackage',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '11.3.0-11.5.99',
            'fluid_styled_content' => '11.3.0-11.5.99',
            'rte_ckeditor' => '11.3.0-11.5.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'JK\\JkSitepackage\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Jöran Kurschatke',
    'author_email' => 'info@joerankurschatke.de',
    'author_company' => 'Jöran Kurschatke',
    'version' => '1.0.0',
];
