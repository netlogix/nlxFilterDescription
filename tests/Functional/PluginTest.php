<?php

namespace nlxFilterDescription\Tests;

use nlxFilterDescription\nlxFilterDescription as Plugin;
use Shopware\Components\Test\Plugin\TestCase;

class PluginTest extends TestCase
{
    protected static $ensureLoadedPlugins = [
        'nlxFilterDescription' => []
    ];

    public function testCanCreateInstance()
    {
        /** @var Plugin $plugin */
        $plugin = Shopware()->Container()->get('kernel')->getPlugins()['nlxFilterDescription'];

        $this->assertInstanceOf(Plugin::class, $plugin);
    }
}
