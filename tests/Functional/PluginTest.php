<?php

namespace sdFilterDescriptionShopware\Tests;

use sdFilterDescriptionShopware\sdFilterDescriptionShopware as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'sdFilterDescriptionShopware' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['sdFilterDescriptionShopware'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
