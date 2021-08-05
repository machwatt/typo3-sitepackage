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
            'typo3' => '{% if package.typo3version < 9000000 %}8.7.0-8.7.99{% elseif package.typo3version < 10000000 %}9.5.0-9.5.99{% else %}10.2.0-10.4.99{% endif %}',
            'fluid_styled_content' => '{% if package.typo3version < 9000000 %}8.7.0-8.7.99{% elseif package.typo3version < 10000000 %}9.5.0-9.5.99{% else %}10.2.0-10.4.99{% endif %}',
            'rte_ckeditor' => '{% if package.typo3version < 9000000 %}8.7.0-8.7.99{% elseif package.typo3version < 10000000 %}9.5.0-9.5.99{% else %}10.2.0-10.4.99{% endif %}',
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
