<?php
$EM_CONF[$_EXTKEY] = array(
    'title' => 'Markdown content element',
    'description' => 'Mardown content element. Write your content in Markdown.',
    'category' => 'BE',
    'author' => 'Michiel Roos',
    'author_email' => 'michiel@maxserv.com',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author_company' => 'MaxServ B.V.',
    'version' => '1.0.0',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.2.0-7.99.99',
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
);
