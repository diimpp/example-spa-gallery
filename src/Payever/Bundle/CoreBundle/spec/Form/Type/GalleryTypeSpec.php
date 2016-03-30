<?php

/*
 * This file is part of the diimpp/example-spa-gallery package.
 *
 * (c) Dmitri Perunov
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Payever\Bundle\CoreBundle\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Payever\Bundle\CoreBundle\Entity\Gallery;

/**
 * Payever GalleryTypeSpec.
 */
class GalleryTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Payever\Bundle\CoreBundle\Form\Type\GalleryType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement(FormTypeInterface::class);
    }

    function it_builds_form(FormBuilderInterface $builder)
    {
        $builder
            ->add('code', TextType::class, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
            ;

        $builder
            ->add('name', TextType::class, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
            ;

        $this->buildForm($builder, array());
    }

    function it_defines_assigned_data_class(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(array(
                'data_class' => Gallery::class,
                'csrf_protection' => false,
            ))
            ->shouldBeCalled();

        $this->configureOptions($resolver);
    }

    function it_has_valid_name()
    {
        $this->getName()->shouldReturn('');
    }
}
