<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright solutionDrive GmbH
 */

namespace sdFilterDescriptionShopware\Services;

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
        $this->filterPrefixList = \explode(',', $this->pluginConfig['sdFilterPrefixList']);
        \array_walk(
            $this->filterPrefixList,
            function (&$value): void {
                $value = \trim($value);
            }
        );
    }
}
