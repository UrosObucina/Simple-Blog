
plugin.tx_simpleblog_bloglisting {
    view {
        templateRootPaths.0 = EXT:simpleblog/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_simpleblog_bloglisting.view.templateRootPath}
        partialRootPaths.0 = EXT:simpleblog/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_simpleblog_bloglisting.view.partialRootPath}
        layoutRootPaths.0 = EXT:simpleblog/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_simpleblog_bloglisting.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_simpleblog_bloglisting.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
     }
    // settings {
    //     blog {
    //         max = 5
    //     }
    // }
    objects {
        TYPO3\CMS\Fluid\Core\Parser\TemplateParser {
            className = Simpleblog\Simpleblog\View\TemplateParser
        }
    }
    _LOCAL_LANG {
    default {
            linkLabel = English link
        }
        de {
            linkLabel = Deutscher Link
        }
    }
}

# these classes are only used in auto-generated templates
plugin.tx_simpleblog._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-simpleblog table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-simpleblog table th {
        font-weight:bold;
    }

    .tx-simpleblog table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
plugin.tx_simpleblog {
    settings {
        blog {
            max = 5
        }
    }
}
// config.tx_extbase {
//     mvc {
//         requestHandlers {
//             TYPO3\CMS\Extbase\Mvc\Web\FrontendRequestHandler = TYPO3\CMS\Extbase\Mvc\Web\FrontendRequestHandler
//             TYPO3\CMS\Extbase\Mvc\Web\BackendRequestHandler = TYPO3\CMS\Extbase\Mvc\Web\BackendRequestHandler
//             TYPO3\CMS\Extbase\Mvc\Cli\RequestHandler = TYPO3\CMS\Extbase\Mvc\Cli\RequestHandler
//         }
//     }
// }
