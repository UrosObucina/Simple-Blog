<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 21.12.2018
 * Time: 11:08
 */

namespace Simpleblog\Simpleblog\ViewHelpers;


class IsFrontendViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractConditionViewHelper
{
    public function render()
    {
        if (TYPO3_MODE === 'FE') {
            return $this->renderThenChild();
        }
        return $this->renderElseChild();
    }
}