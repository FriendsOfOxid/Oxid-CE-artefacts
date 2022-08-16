<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\EshopCommunity\Internal\Framework\Module\Install\Service;

interface ProjectConfigurationGeneratorInterface
{
    /**
     * Generates default project configuration.
     */
    public function generate(): void;
}
