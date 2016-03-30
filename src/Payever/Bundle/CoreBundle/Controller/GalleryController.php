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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Payever\Bundle\CoreBundle\Entity\Gallery;
use Payever\Bundle\CoreBundle\Form\Type\GalleryType;

/**
 * Gallery controller.
 */
class GalleryController extends FOSRestController
{
    /**
     * Lists galleries.
     *
     * @return Response
     */
    public function indexAction()
    {
        $galleries = $this->getGalleryRepository()->findAll();

        $view = $this->view($galleries);

        return $this->handleView($view);
    }

    /**
     * Creates gallery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function createAction(Request $request)
    {
        $gallery = new Gallery();
        $form = $this->get('form.factory')->create(GalleryType::class, $gallery);

        if ($request->isMethod('POST') && $form->submit($request)->isValid()) {
            $gallery = $form->getData();

            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($gallery);
            $em->flush();

            return $this->handleView($this->view($gallery, 201));
        }

        return $this->handleView($this->view($form, 400));
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
