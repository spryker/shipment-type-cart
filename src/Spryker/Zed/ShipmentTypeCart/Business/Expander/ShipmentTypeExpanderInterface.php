<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShipmentTypeCart\Business\Expander;

use Generated\Shared\Transfer\CartChangeTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

interface ShipmentTypeExpanderInterface
{
    public function expandQuoteItemsWithShipmentType(QuoteTransfer $quoteTransfer): QuoteTransfer;

    public function expandCartChangeItemsWithShipmentType(CartChangeTransfer $cartChangeTransfer): CartChangeTransfer;
}
