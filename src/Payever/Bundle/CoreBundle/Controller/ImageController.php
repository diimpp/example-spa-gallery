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
 * Image controller.
 */
class ImageController extends FOSRestController
{
    /**
     * List images.
     *
     * @return Response
     */
    public function indexAction()
    {
        $images = $this->getImageRepository()->findAll();

        $view = $this
            ->view($images)
            ;

        return $this->handleView($view);
    }

    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getImageRepository()
    {
        return $this->get('payever.repository.image');
    }

    /**
     * Finds gallery or throws 404.
     *
     * @param string $id
     *
     * @return \Payever\Bundle\CoreBundle\Entity\ImageInterface
     *
     * @throws NotFoundHttpException
     */
    protected function findOrderOr404($id)
    {
        if (null === $image = $this->getImageRepository()->findOneBy(array('id' => $id))) {
            throw $this->createNotFoundException('The image does not exist.');
        }

        return $image;
    }
}
