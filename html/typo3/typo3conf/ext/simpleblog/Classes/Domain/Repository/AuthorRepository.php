<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20.12.2018
 * Time: 13:55
 */

namespace Simpleblog\Simpleblog\Domain\Repository;


class AuthorRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected $defaultOrderings = array('fullname' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING);
}