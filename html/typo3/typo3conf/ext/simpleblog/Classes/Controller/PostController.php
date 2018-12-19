<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 19.12.2018
 * Time: 15:44
 */

namespace Simpleblog\Simpleblog\Controller;


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

    /**
     * @param \Simpleblog\Simpleblog\Domain\Model\Blog $blog
     * @param \Simpleblog\Simpleblog\Domain\Model\Post $post
     */
    public function addFormAction(\Simpleblog\Simpleblog\Domain\Model\Blog $blog, \Simpleblog\Simpleblog\Domain\Model\Post $post = NULL)
    {
        $post->setPostdate(new \DateTime());
        //$this->postRepository->add($post);
        $blog->addPost($post);
        $this->objectManager->get('Simpleblog\\Simpleblog\\Domain\\Repository\\BlogRepository')->update($blog);
        $this->redirect('show', 'Blog', NULL, array('blog' => $blog));
        $this->view->assign('blog', $blog);
        $this->view->assign('post', $post);
    }
}