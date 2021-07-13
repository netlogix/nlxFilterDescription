<?php
declare(strict_types=1);

/*
 * Created by netlogix GmbH & Co. KG
 *
 * @copyright netlogix GmbH & Co. KG
 */

namespace nlxFilterDescriptionShopware\Services;

class Config implements ConfigInterface
{
    /** @var array|mixed[] */
    private $pluginConfig;

    /** @var string[] */
    private $filterPrefixList = [];

    /**
     * @param array|mixed[] $pluginConfig complex configuration array
     */
    public function __construct(
        array $pluginConfig
    ) {
        $this->pluginConfig = $pluginConfig;
        $this->initConfig();
    }

    /**
     * {@inheritdoc}
     */
    public function getFilterPrefixList(): array
    {
        return $this->filterPrefixList;
    }

    private function initConfig(): void
    {
        $this->filterPrefixList = \explode(',', $this->pluginConfig['nlxFilterPrefixList']);
        \array_walk(
            $this->filterPrefixList,
            function (&$value): void {
                $value = \trim($value);
            }
        );
    }
}
