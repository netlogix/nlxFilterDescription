<?php
declare(strict_types=1);

/*
 * Created by netlogix GmbH & Co. KG
 *
 * @copyright netlogix GmbH & Co. KG
 */

namespace nlxFilterDescription\Services;

interface ConfigInterface
{
    /**
     * @return string[]
     */
    public function getFilterPrefixList(): array;
}
