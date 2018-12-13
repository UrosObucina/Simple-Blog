<?php
namespace Pluswerk\Simpleblog\Domain\Model;

/***
 *
 * This file is part of the "Simple Blog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018
 *
 ***/

/**
 * Authors
 */
class Author extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * fullname
     *
     * @var string
     * @validate NotEmpty
     */
    protected $fullname = '';

    /**
     * emial
     *
     * @var string
     * @validate NotEmpty
     */
    protected $emial = '';

    /**
     * Returns the fullname
     *
     * @return string $fullname
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Sets the fullname
     *
     * @param string $fullname
     * @return void
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * Returns the emial
     *
     * @return string $emial
     */
    public function getEmial()
    {
        return $this->emial;
    }

    /**
     * Sets the emial
     *
     * @param string $emial
     * @return void
     */
    public function setEmial($emial)
    {
        $this->emial = $emial;
    }
}
