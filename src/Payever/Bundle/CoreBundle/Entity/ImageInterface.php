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

/**
 * Image Interface.
 */
interface ImageInterface
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
     * Gets gallery.
     *
     * @return Gallery
     */
    public function getGallery();

    /**
     * Sets gallery.
     *
     * @param Gallery $gallery
     */
    public function setGallery(Gallery $gallery);
}
