<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 21.12.2018
 * Time: 11:42
 */

namespace Simpleblog\Simpleblog\ViewHelpers\Widget;


class SortViewHelper extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetViewHelper
{
    /**
     * @var \Simpleblog\Simpleblog\ViewHelpers\Widget\Controller\SortController
     * @inject
     */
    protected $controller;
    /**
     * @param \TYPO3\CMS\Extbase\Persistence\QueryResultInterface $objects
     * @param string $as
     * @param string $property
     * @return string
     */
    public function render(\TYPO3\CMS\Extbase\Persistence\QueryResultInterface $objects, $as, $property)
    {
        return $this->initiateSubRequest();
    }
}