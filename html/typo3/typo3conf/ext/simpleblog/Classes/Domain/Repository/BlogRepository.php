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
 * The repository for Blogs
 */
class BlogRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function findBySearchWord($serach,$words=array('uros','1'))
    {
        $query = $this->createQuery();
        $query->matching(
            $query->logicalOr(
                $query->logicalAnd(
                    $query->like('title','%'.$serach.'^%'),
                    $query->equals('description', '')
                ),
                $query->logicalAnd(
                    $query->equals('title','TYPO3'),
                    $query->like('description', '%is fantastioc%')
                ),
                $query->in('title',$words)
            )
        );
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($query->execute());
        return $query->execute();
    }

    /**
     * @param string $search
     * @return
     */
    public function findSearchForm($search,$limit)
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($limit);
        $query = $this->createQuery();
        $query->matching(
            $query->like('title','%'.$search.'%')
        );
        $query->setOrderings(array('title' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
        $limit = (int)$limit;
        if ($limit > 0) {
            $query->setLimit($limit);
        }
        return $query->execute();
    }
}
