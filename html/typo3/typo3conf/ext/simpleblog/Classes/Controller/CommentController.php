<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 22.12.2018
 * Time: 13:31
 */

namespace Simpleblog\Simpleblog\Controller;


/**
 * Class CommentController
 * @package Simpleblog\Simpleblog\Controller
 */
class CommentController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * @var \Simpleblog\Simpleblog\Domain\Repository\CommentRepository
     */
    protected $commentRepository;

    /**
     * @param \Simpleblog\Simpleblog\Domain\Repository\CommentRepository $commentRepository
     */
    public function injectCommentRepository(\Simpleblog\Simpleblog\Domain\Repository\CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function initializeAction()
    {
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(FALSE);
        $querySettings->setIgnoreEnableFields(TRUE);
        $querySettings->setIncludeDeleted(TRUE);
        $this->commentRepository->setDefaultQuerySettings($querySettings);
    }

    /**
     *
     */
    public function indexAction()
    {

    }

    /**
     *
     */
    public function listAction()
    {
        $this->view->assign('commentsLive', $this->commentRepository->findByDeleted(0));
        $this->view->assign('commentsDeleted', $this->commentRepository->findByDeleted(1));
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Comment $comment
     */
    public  function deleteAction(\Simpleblog\Simpleblog\Domain\Model\Comment $comment)
    {
        $this->commentRepository->remove($comment);
        $this->redirect('list');
    }
    public function testAction()
    {
        return "Output of action test.";
    }
}