<?php

namespace Payever\Bundle\CoreBundle\DataFixtures\ORM;

use Payever\Bundle\CoreBundle\DataFixtures\DataFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Payever\Bundle\CoreBundle\Entity\Image;
use Payever\Bundle\CoreBundle\Entity\GalleryInterface;

/**
 * Image fixtures.
 */
class LoadImageData extends DataFixture
{
    /**
     * @var array
     */
    private $images = [
        [
            'code' => 'image1',
            'gallery' => 'gallery1',
        ],
        [
            'code' => 'image2',
            'gallery' => 'gallery2',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->images as $imageData) {
            $image = $this->createImage(
                $imageData['code'],
                $this->getReference('Payever.Gallery.'.$imageData['gallery'])
            );

            $manager->persist($image);
            $this->setReference('Payever.Image.'.$image->getCode(), $image);
        }

        $manager->flush();
    }

    /**
     * @param string           $code
     * @param string           $path
     * @param GalleryInterface $gallery
     *
     * @return Image
     */
    private function createImage($code, GalleryInterface $gallery)
    {
        $image = new Image();

        $image->setCode($code);
        $image->setGallery($gallery);

        return $image;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }
}
