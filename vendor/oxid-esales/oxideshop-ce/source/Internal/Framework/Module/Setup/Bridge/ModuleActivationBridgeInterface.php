<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\EshopCommunity\Internal\Framework\Module\Setup\Bridge;

/**
 * @stable
 * @see OxidEsales/EshopCommunity/Internal/README.md
 */
interface ModuleActivationBridgeInterface
{
    /**
     * @param string $moduleId
     * @param int    $shopId
     */
    public function activate(string $moduleId, int $shopId);

    /**
     * @param string $moduleId
     * @param int    $shopId
     */
    public function deactivate(string $moduleId, int $shopId);

    /**
     * @param string $moduleId
     * @param int    $shopId
     * @return bool
     */
    public function isActive(string $moduleId, int $shopId): bool;
}
