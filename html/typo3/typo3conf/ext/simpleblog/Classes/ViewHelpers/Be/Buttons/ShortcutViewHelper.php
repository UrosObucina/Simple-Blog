<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 26.12.2018
 * Time: 11:20
 */

namespace Simpleblog\Simpleblog\ViewHelpers\Be\Buttons;

use TYPO3\CMS\Backend\Template\DocumentTemplate;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\Facets\CompilableInterface;
use TYPO3\CMS\Fluid\ViewHelpers\Be\AbstractBackendViewHelper;

class ShortcutViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Be\Buttons\ShortcutViewHelper
{
    /**
     * @param array $arguments
     * @param callable $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        $getVars = $arguments['getVars'];
        $setVars = $arguments['setVars'];
        $mayMakeShortcut = $GLOBALS['BE_USER']->mayMakeShortcut();
        if ($mayMakeShortcut) {
            $doc = GeneralUtility::makeInstance(DocumentTemplate::class);
            $currentRequest = $renderingContext->getControllerContext()->getRequest();
            $extensionName = $currentRequest->getControllerExtensionName();
            $moduleName = $currentRequest->getPluginName();
            if (count($getVars) === 0) {
                $modulePrefix = strtolower('tx_' . $extensionName . '_' . $moduleName);
                $getVars = array('id', 'M', $modulePrefix);
            }
            $getList = implode(',', $getVars);
            $setList = implode(',', $setVars);
            return $doc->makeShortcutIcon($getList, $setList, $moduleName, '', 'btn btn-default btn-sm');
        }
        return '';
    }
}