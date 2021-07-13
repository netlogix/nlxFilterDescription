<?php
declare(strict_types=1);

/*
 * Created by netlogix GmbH & Co. KG
 *
 * @copyright netlogix GmbH & Co. KG
 */

namespace spec\nlxFilterDescriptionShopware\Services;

use PhpSpec\ObjectBehavior;
use nlxFilterDescriptionShopware\Services\Config;
use nlxFilterDescriptionShopware\Services\ConfigInterface;

class ConfigSpec extends ObjectBehavior
{
    public function let(): void
    {
        $pluginConfig = [
            'nlxFilterPrefixList' => 'test1, test2 ,  test3 ',
        ];
        $this->beConstructedWith($pluginConfig);
    }

    public function it_can_be_constructed(): void
    {
        $this->shouldHaveType(Config::class);
    }

    public function it_implements_interface(): void
    {
        $this->shouldImplement(ConfigInterface::class);
    }

    public function it_can_get_filter_prefix_list(): void
    {
        $this->getFilterPrefixList()
            ->shouldReturn(['test1', 'test2', 'test3']);
    }
}
