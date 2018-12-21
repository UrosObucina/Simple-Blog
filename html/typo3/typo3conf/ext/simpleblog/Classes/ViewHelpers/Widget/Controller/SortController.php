<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 21.12.2018
 * Time: 11:51
 */

namespace Simpleblog\Simpleblog\ViewHelpers\Widget\Controller;


class SortController extends \TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    protected $objects;

    public function initializeAction()
    {
        $this->objects = $this->widgetConfiguration['objects'];
    }

    /**
     * @param string $order
     */
    public function indexAction($order = \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING)
    {
        //setovao tip ASC ili DESC
        $order = ($order == \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING) ? \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING : \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING;
        // naparavi objekat za objekte
        $query = $this->objects->getQuery();
        // setovao koji ce ordering da bude
        $query->setOrderings(array($this->widgetConfiguration['property'] => $order));
        //izvrsi upuit
        $modifiedObjects = $query->execute();
        //dodelio contentArguments-u vrednos
        $this->view->assign('contentArguments', array(
            $this->widgetConfiguration['as'] => $modifiedObjects));
        $this->view->assign('order', $order);
        }
}