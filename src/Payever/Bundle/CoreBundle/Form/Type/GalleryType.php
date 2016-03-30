<?php

namespace Payever\Bundle\CoreBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Payever\Bundle\CoreBundle\Entity\Gallery;

class GalleryType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class, [
                'required' => true,
            ])
            ->add('name', TextType::class, [
                'required' => true,
            ])
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'data_class' => Gallery::class,
                'csrf_protection' => false,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return '';
    }
}
