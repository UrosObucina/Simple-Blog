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
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($blogs);die;
        $this->view->assign('blogs', $this->blogRepository->findAll());
    }

    /**
     * action add
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
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     */
    public function deleteAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog)
    {
        $this->blogRepository->remove($blog);
    }
}
