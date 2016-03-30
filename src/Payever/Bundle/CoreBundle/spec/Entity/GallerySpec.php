<?php

/*
 * This file is part of the diimpp/example-spa-gallery package.
 *
 * (c) Dmitri Perunov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Payever\Bundle\CoreBundle\Entity;

use PhpSpec\ObjectBehavior;
use Payever\Bundle\CoreBundle\Entity\GalleryInterface;

/**
 * Payever GallerySpec.
 */
class GallerySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Payever\Bundle\CoreBundle\Entity\Gallery');
    }

    public function it_implements_Payever_core_gallery_interface()
    {
        $this->shouldImplement(GalleryInterface::class);
    }

    public function its_code_is_mutable($code)
    {
        $this->setCode($code);
        $this->getCode()->shouldReturn($code);
    }

    public function its_name_is_mutable($name)
    {
        $this->setName($name);
        $this->getName()->shouldReturn($name);
    }
}
