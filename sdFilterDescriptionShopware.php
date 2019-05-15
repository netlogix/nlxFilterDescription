<?php

namespace sdFilterDescriptionShopware;

use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class sdFilterDescriptionShopware extends Plugin
{

    /**
    * @param ContainerBuilder $container
    */
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('sdfilterdescriptionshopware.plugin_dir', $this->getPath());
        parent::build($container);
    }
}
