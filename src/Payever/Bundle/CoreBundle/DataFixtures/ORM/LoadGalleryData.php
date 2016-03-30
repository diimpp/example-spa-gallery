<?php

namespace Payever\Bundle\CoreBundle\DataFixtures\ORM;

use Payever\Bundle\CoreBundle\DataFixtures\DataFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Payever\Bundle\CoreBundle\Entity\Gallery;

/**
 * Gallery fixtures.
 */
class LoadGalleryData extends DataFixture
{
    /**
     * @var array
     */
    private $galleries = [
        [
            'code' => 'gallery1',
            'name' => 'Images gallery #1',
        ],
        [
            'code' => 'gallery2',
            'name' => 'Images gallery #2',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->galleries as $galleryData) {
            $gallery = $this->createGallery(
                $galleryData['code'],
                $galleryData['name']
            );

            $manager->persist($gallery);
            $this->setReference('Payever.Gallery.'.$gallery->getCode(), $gallery);
        }

        $manager->flush();
    }

    /**
     * @param string $code
     * @param string $name
     *
     * @return Gallery
     */
    private function createGallery($code, $name)
    {
        $gallery = new Gallery();

        $gallery->setCode($code);
        $gallery->setName($name);

        return $gallery;
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }
}
