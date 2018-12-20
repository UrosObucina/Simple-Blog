<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20.12.2018
 * Time: 8:36
 */

namespace Simpleblog\Simpleblog\Domain\Repository;


/**
 * Class TagRepository
 * @package Simpleblog\Simpleblog\Domain\Repository
 */
class TagRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = array('tagvalue' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
}