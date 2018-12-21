<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 21.12.2018
 * Time: 10:44
 */

namespace Simpleblog\Simpleblog\ViewHelpers;


class GravatarViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper
{
    protected $tagName = 'img';

    public function initializeArguments()
    {
        $this->registerArgument('email', 'string',
            'Email for lookup at gravatar database', FALSE);
        $this->registerArgument('size', 'integer',
            'Size of gravatar picture', FALSE, 100);
    }

    public function render()
    {
        $email = ($this->arguments['email']) ?: $this->renderChildren();
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->arguments['email']);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->renderChildren());
        $gravatarUri = 'http://www.gravatar.com/avatar/' . md5($email) . '?s=' . urlencode($this->arguments['size']);
        $this->tag->addAttribute('src', $gravatarUri);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->tag->addAttribute('src', $gravatarUri));
        return $this->tag->render();
    }
}