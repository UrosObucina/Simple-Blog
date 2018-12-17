<?php
namespace Simpleblog\Simpleblog\Domain\Repository;

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
 * The repository for Posts
 */
class PostRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var \Simpleblog\Simpleblog\Domain\Repository\CommentRepository
     * @inject
     */
    protected $commentRepository;
    public function initializeAction()
    {
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(FALSE);
        $querySettings->setIgnoreEnableFields(TRUE);
        $querySettings->setIncludeDeleted(TRUE);
        $this->commentRepository->setDefaultQuerySettings($querySettings);
    }
    }
