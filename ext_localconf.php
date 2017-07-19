<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

    // scheduler task
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['scheduler']['tasks']['Webwaren\Extbaselangtest\Task\Task'] = array(
        'extension' => 'Webwaren.Extbaselangtest',
        'title' => 'Extbase language Test',
        'description' => ''
    );


    }
);
