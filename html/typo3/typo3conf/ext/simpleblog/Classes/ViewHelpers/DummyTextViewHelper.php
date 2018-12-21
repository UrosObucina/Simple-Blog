<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 21.12.2018
 * Time: 9:13
 */

namespace Simpleblog\Simpleblog\ViewHelpers;


class DummyTextViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    public function initializeArguments()
    {
        $this->registerArgument('length', 'integer', 'This is the length of the dummytext', false);

    }

    /**
     * @param int $length
     * @return string
     */
    public function render()
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->arguments['length']);
        $length = ($this->arguments['length']) ?: 100;
        $dummytext = ($this->renderChildren()) ?: 'Lorem ipsum dolor sit amet.';
        $len = strlen($dummytext);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($len);
        $repeat = ceil($this->arguments['length'] / $len);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->arguments['length']);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($repeat);
        $dummytext = substr(str_repeat($dummytext,$repeat),0,$this->arguments['length']);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($dummytext);
        return $dummytext;
    }
}