<?php

/*
 * This file is part of the diimpp/payever-gallery package.
 *
 * (c) Dmitri Perunov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Payever\Bundle\CoreBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Gallery controller.
 */
class GalleryController extends FOSRestController
{
    /**
     * List galleries.
     *
     * @return Response
     */
    public function indexAction()
    {
        $galleries = $this->getGalleryRepository()->findAll();

        $view = $this
            ->view($galleries)
            ;

        return $this->handleView($view);
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getGalleryRepository()
    {
        return $this->get('payever.repository.gallery');
    }

    /**
     * Finds gallery or throws 404.
     *
     * @param string $number
     *
     * @return \Payever\Bundle\CoreBundle\Entity\GalleryInterface
     *
     * @throws NotFoundHttpException
     */
    protected function findOrderOr404($id)
    {
        if (null === $gallery = $this->getGalleryRepository()->findOneBy(array('id' => $id))) {
            throw $this->createNotFoundException('The gallery does not exist.');
        }

        return $gallery;
    }
}
