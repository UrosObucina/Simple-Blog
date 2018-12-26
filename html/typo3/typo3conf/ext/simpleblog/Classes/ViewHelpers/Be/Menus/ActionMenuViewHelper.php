<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 26.12.2018
 * Time: 11:16
 */

namespace Simpleblog\Simpleblog\ViewHelpers\Be\Menus;


class ActionMenuViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Be\Menus\ActionMenuViewHelper
{
    /**
     * @param string $defaultController
     * @return string
     */
    public function render($defaultController = null)
    {
        $this->tag->addAttribute('class', 'form-control input-sm');
        $this->tag->addAttribute('onchange', 'jumpToUrl(this.options[this.selectedIndex].value, this);');
        $options = '';
        foreach ($this->childNodes as $childNode) {
            if ($childNode instanceof \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ViewHelperNode) {
                $options .= $childNode->evaluate($this->renderingContext);
            }
        }
        $this->tag->setContent($options);
        return $this->tag->render();
    }
}