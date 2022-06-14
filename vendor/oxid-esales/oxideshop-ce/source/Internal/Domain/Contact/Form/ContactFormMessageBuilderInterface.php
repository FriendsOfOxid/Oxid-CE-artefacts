<?php

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

declare(strict_types=1);

namespace OxidEsales\EshopCommunity\Internal\Domain\Contact\Form;

use OxidEsales\EshopCommunity\Internal\Framework\Form\FormInterface;

interface ContactFormMessageBuilderInterface
{
    /**
     * @param FormInterface $form
     * @return string
     */
    public function getContent(FormInterface $form);
}
