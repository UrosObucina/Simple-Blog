<?php
namespace Simpleblog\Simpleblog\Controller;

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
 * BlogController
 */
class BlogController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * blogRepository
     *
     * @var \Simpleblog\Simpleblog\Domain\Repository\BlogRepository
     * @inject
     */
    protected $blogRepository = null;

    /**
     * @param \Simpleblog\Simpleblog\Domain\Repository\BlogRepository $blogRepository
     */
    public function injectBlogRepository(\Simpleblog\Simpleblog\Domain\Repository\BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * @param string $search
     */
    public function listAction()
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings['blog']['max']);
        if($this->request->hasArgument('serach'))
        {
            $search = $this->request->getArgument('search');
        }
        $limit = ($this->settings['blog']['max']) ?: NULL;
        $this->view->assign('blogs', $this->blogRepository->findSearchForm($search,$limit));
        $this->view->assign('search', $search);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($search);
    }

    /**
     * add action - adds a blog to the repository
     * @validate $blog Simpleblog.Simpleblog:Autocomplete(property=title)
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     */
    public function addAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog)
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($blog);die;
        $this->blogRepository->add($blog);
        $this->redirect('list');
    }
    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog|NULL $blog
     */
    public function addFormAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog = NULL)
    {
        $this->view->assign('blog',$blog);
    }
    /**
     * @ignorevalidation $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     */
    public function showAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->view->assign('blog',$blog);
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     */
    public function updateFormAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->view->assign('blog',$blog);
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     */
    public function updateAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->blogRepository->update($blog);
        $this->redirect('list');
    }
    /**
     *  @ignorevalidation $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     */
    public function deleteAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->blogRepository->remove($blog);
        $this->redirect('list');
    }
    /**
     *  @ignorevalidation $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     */
    public function deleteFormAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->view->assign('blog',$blog);
    }

    /**
     *
     */
    public function initializeObject()
    {
        // determine query settings
        /** @var $querySettings \TYPO3\CMS\Extbase\Persistence\GenericTypo3QuerySettings */
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        // go for $defaultQuerySettings = $this->createQuery()->getQuerySettings();
        // ignore storage PID initially
                $querySettings->setRespectStoragePage(FALSE);
        // set new storage PID
                $querySettings->setStoragePageIds(array(1, 26, 989));
        // ignore fields of "enablecolumns"
                $querySettings->setIgnoreEnableFields(TRUE);
        // ignore fields "disabled" and "starttime"
                $querySettings->setEnableFieldsToBeIgnored(array('disabled','starttime'));
        // include "deleted" records
                $querySettings->setIncludeDeleted(TRUE);
        // ignore language initially
                $querySettings->setRespectSysLanguage(FALSE);
            }
        // example for a repository method

    /**
     * @return mixed
     */
    public function findSomething() {
                $query = $this->createQuery();
        // ignore storage PID initially
                $query->getQuerySettings()->setRespectStoragePage(FALSE);
                return $query->execute();
            }
}
