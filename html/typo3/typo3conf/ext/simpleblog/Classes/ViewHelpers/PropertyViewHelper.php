<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 19.12.2018
 * Time: 13:31
 */

namespace Simpleblog\Simpleblog\ViewHelpers;


class PropertyViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * @param string $propertyName
     * @param mixed $object
     * @return mixed
     */
    public function render($propertyName, $subject = NULL)
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($propertyName);
        if ($subject === NULL) {
            $subject = $this->renderChildren();
        }
        return \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getPropertyPath($subject, $propertyName);
    }
}