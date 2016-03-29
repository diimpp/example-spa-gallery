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
 * Gallery.
 */
class Gallery implements GalleryInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ArrayCollection
     */
    private $images;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * {@inheritdoc}
     */
    public function setImages(ArrayCollection $images)
    {
        $this->images = $images;
    }

    /**
     * {@inheritdoc}
     */
    public function addImage(ImageInterface $image)
    {
        $this->images->add($image);
    }

    /**
     * {@inheritdoc}
     */
    public function removeImage(ImageInterface $image)
    {
        $this->images->removeElement($image);
    }
}
