<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {



        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('extbaselangtest', 'Configuration/TypoScript', 'Extbase Language Test');


        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_extbaselangtest_domain_model_object', 'EXT:extbaselangtest/Resources/Private/Language/locallang_csh_tx_extbaselangtest_domain_model_object.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_extbaselangtest_domain_model_object');



    }
);
