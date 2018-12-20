<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 19.12.2018
 * Time: 15:44
 */

namespace Simpleblog\Simpleblog\Controller;


use Simpleblog\Simpleblog\Domain\Model\Blog;

/**
 * Class PostController
 * @package Simpleblog\Simpleblog\Controller
 */
class PostController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @var \Simpleblog\Simpleblog\Domain\Repository\PostRepository
     */
    protected $postRepository;

    /**
     * @param \Simpleblog\Simpleblog\Domain\Repository\PostRepository $postRepository
     */
    public function injectPostRepository(\Simpleblog\Simpleblog\Domain\Repository\PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function initializeAction()
    {
        $action = $this->request->getControllerActionName();
        // check, if a different action than "show" was executed
        if ($action != 'show' && $action != 'ajax') {
            // redirect to the login page (UID=12), if user is not logged-in
            if (!$GLOBALS['TSFE']->fe_user->user['uid']) {
                $this->redirect(NULL, NULL, NULL, NULL, $this->settings['loginpage']);
            }
        }
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Post $post
     */
    public function addFormAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog, \Simpleblog\Simpleblog\Domain\Model\Post $post = NULL)
    {
        $tagRepository = $this->objectManager->get(\Simpleblog\Simpleblog\Domain\Repository\TagRepository::class);
        $querySettings = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(false);
        $tagRepository->setDefaultQuerySettings($querySettings);
        $authorRepository = $this->objectManager->get(\Simpleblog\Simpleblog\Domain\Repository\AuthorRepository::class);
        $authorRepository->setDefaultQuerySettings($querySettings);
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
        //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($tagRepository->findAll());
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($tagRepository->findAll());
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($authorRepository->findAll());
        //$this->view->assign('authors', $this->objectManager->get('Simpleblog\\Simpleblog\\Domain\\Repository\\AuthorRepository')->findAll());
        $this->view->assign('tags', $tagRepository->findAll());
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Post $post
     */
    public function addAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog, \Simpleblog\Simpleblog\Domain\Model\Post $post)
    {
        $post->setPostdate(new \DateTime());
        //$this->postRepository->add($post);
        $post->setAuthor($this->objectManager->get('Simpleblog\\Simpleblog\\Domain\\Repository\\AuthorRepository')->findOneByUid($GLOBALS['TSFE']->fe_user->user['uid']));
        $blog->addPost($post);
        $this->objectManager->get('Simpleblog\\Simpleblog\\Domain\\Repository\\BlogRepository')->update($blog);
        $this->redirect('show', 'Blog', NULL, array('blog' => $blog));
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Post $post
     */
    public function showAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog, \Simpleblog\Simpleblog\Domain\Model\Post $post)
    {
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
        $this->objectManager->get('Simpleblog\\Simpleblog\\Domain\\Repository\\TagRepository')->findAll();
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Post $post
     */
    public function updateFormAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog, \Simpleblog\Simpleblog\Domain\Model\Post $post)
    {
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
        $this->view->assign('tags', $this->objectManager->get('Simpleblog\\Simpleblog\\Domain\\Repository\\TagRepository')->findAll());
        $this->view->assign('authors', $this->objectManager->get('Simpleblog\\Simpleblog\\Domain\\Repository\\AuthorRepository')->findAll());
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Post $post
     */
    public function updateAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog, \Simpleblog\Simpleblog\Domain\Model\Post $post)
    {
        $this->postRepository->update($post);
        $this->redirect('show', 'Blog', NULL, array('blog' => $blog));
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Post $post
     */
    public function deleteFormAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog, \Simpleblog\Simpleblog\Domain\Model\Post $post)
    {
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
    }

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Post $post
     */
    public function deleteAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog, \Simpleblog\Simpleblog\Domain\Model\Post $post)
    {
        //izbrisi iz bloga post
        $blog->removePost($post);
        // update blog da se prikaze promena
        $this->objectManager('Simpleblog\\Simpleblog\\Domain\\Repository\\BlogRepository')->update($blog);
        // obrisi sam post
        $this->postRepository->remove($post);
        //redirektuje ga na show akciju kontroler blog
        $this->redirect('show', 'Blog', NULL, array('blog' => $blog));
    }
    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Post $post
     * @param \Simpleblog\Simpleblog\Domain\Model\Comment $comment
     */
    public function ajaxAction(\Simpleblog\Simpleblog\Domain\Model\Post $post, \Simpleblog\Simpleblog\Domain\Model\Comment $comment = NULL)
    {
    // do not execute persistive function of comment is empty
        if ($comment->getComment() == "") return FALSE;
    // set date/time of comment and add comment to the Post
        $comment->setCommentdate(new \DateTime());
        $post->addComment($comment);
        $this->postRepository->update($post);
        $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\PersistenceManager')->persistAll();
        $comments = $post->getComments();
        foreach ($comments as $comment) {
            $json[$comment->getUid()] = array(
                'comment' => $comment->getComment(),
                'commentdate' => $comment->getCommentdate()
            );
        }
        return json_encode($json);
    }
}