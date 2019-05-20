<?php
declare(strict_types=1);

/*
 * Created by solutionDrive GmbH
 *
 * @copyright solutionDrive GmbH
 */

namespace sdFilterDescriptionShopware\Services;

interface ConfigInterface
{
    /**
     * @return string[]
     */
    public function getFilterPrefixList(): array;
}
