<?php

/*
 * This file is part of the diimpp/payever-gallery package.
 *
 * (c) Dmitri Perunov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Payever\Bundle\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gallery Interface.
 */
interface GalleryInterface
{
    /**
     * Gets code.
     *
     * @return string
     */
    public function getCode();

    /**
     * Sets code.
     *
     * @param string $code
     */
    public function setCode($code);

    /**
     * Gets name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets name.
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * Gets images.
     */
    public function getImages();

    /**
     * Sets images.
     *
     * @param ArrayCollection $images
     */
    public function setImages(ArrayCollection $images);

    /**
     * Adds image.
     *
     * @param ImageInterface $image
     */
    public function addImage(ImageInterface $image);

    /**
     * Removes image.
     *
     * @param ImageInterface $image
     */
    public function removeImage(ImageInterface $image);
}
