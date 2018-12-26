<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Simpleblog.Simpleblog',
            'Bloglisting',
            'SimpleBlog'
        );

        if (TYPO3_MODE === 'BE') {
            // Module System > Backend Users
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'Simpleblog.Simpleblog',
                'system',
                'SimpleblogAdmin',
                'top',
                array(
                    'Comment' => 'list,index,delete,test'
                ),
                array(

                    'access' => 'admin',
                    'labels' => 'Simpleblog'
                )
            );
        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('simpleblog', 'Configuration/TypoScript', 'Simple Blog');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_simpleblog_domain_model_blog', 'EXT:simpleblog/Resources/Private/Language/locallang_csh_tx_simpleblog_domain_model_blog.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_simpleblog_domain_model_blog');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_simpleblog_domain_model_post', 'EXT:simpleblog/Resources/Private/Language/locallang_csh_tx_simpleblog_domain_model_post.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_simpleblog_domain_model_post');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_simpleblog_domain_model_comment', 'EXT:simpleblog/Resources/Private/Language/locallang_csh_tx_simpleblog_domain_model_comment.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_simpleblog_domain_model_comment');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_simpleblog_domain_model_author', 'EXT:simpleblog/Resources/Private/Language/locallang_csh_tx_simpleblog_domain_model_author.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_simpleblog_domain_model_author');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_simpleblog_domain_model_tag', 'EXT:simpleblog/Resources/Private/Language/locallang_csh_tx_simpleblog_domain_model_tag.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_simpleblog_domain_model_tag');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('_MOD_system_SimpleblogSimpleblogadmin','EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_csh.xlf');

        $TCA['fe_users']['ctrl']['label'] = 'name';

    }
);

