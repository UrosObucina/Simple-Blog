<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 19.12.2018
 * Time: 14:20
 */

namespace Simpleblog\Simpleblog\ViewHelpers;


class HasErrorViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\AbstractFormFieldViewHelper
{
    public function initializeArguments()
    {
        $this->registerArgument('property', 'string', 'Name of object property.', TRUE);
    }

    /**
     * Validation and Error Handling 215
     * @param string $then
     * @param string $else
     * @return string
     */
    public function render($then = '', $else = '')
    {
        $originalRequestMappingResults = $this->controllerContext->getRequest()->getOriginalRequestMappingResults();
        $formObjectName = $this->viewHelperVariableContainer->get('TYPO3\\CMS\\Fluid\\ViewHelpers\\Form\ViewHelper', 'formObjectName');
        $errors = $originalRequestMappingResults->forProperty($formObjectName)->forProperty($this->arguments['property']);
        if ($errors->hasErrors() == 1) {
            return $then;
        } else {
            return $else;
        }
    }
}

?>