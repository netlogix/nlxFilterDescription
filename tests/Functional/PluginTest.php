<?php

namespace nlxFilterDescriptionShopware\Tests;

use nlxFilterDescriptionShopware\nlxFilterDescriptionShopware as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'nlxFilterDescriptionShopware' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['nlxFilterDescriptionShopware'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
