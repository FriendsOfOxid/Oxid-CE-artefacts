<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\EshopCommunity\Internal\Domain\Review\Service;

use Doctrine\Common\Collections\ArrayCollection;

interface UserRatingServiceInterface
{
    /**
     * Returns Ratings of User.
     *
     * @param string $userId
     *
     * @return ArrayCollection
     */
    public function getRatings($userId);
}
