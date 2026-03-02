<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\ShipmentTypeCart\Business\Expander;

use ArrayObject;
use Generated\Shared\Transfer\CartChangeTransfer;
use Generated\Shared\Transfer\QuoteTransfer;

class ShipmentTypeExpander implements ShipmentTypeExpanderInterface
{
    public function expandQuoteItemsWithShipmentType(QuoteTransfer $quoteTransfer): QuoteTransfer
    {
        $this->expandItemsWithShipmentType($quoteTransfer->getItems());

        return $quoteTransfer;
    }

    public function expandCartChangeItemsWithShipmentType(CartChangeTransfer $cartChangeTransfer): CartChangeTransfer
    {
        $this->expandItemsWithShipmentType($cartChangeTransfer->getItems());

        return $cartChangeTransfer;
    }

    /**
     * @param \ArrayObject<array-key, \Generated\Shared\Transfer\ItemTransfer> $itemTransfers
     *
     * @return \ArrayObject<array-key, \Generated\Shared\Transfer\ItemTransfer>
     */
    protected function expandItemsWithShipmentType(ArrayObject $itemTransfers): ArrayObject
    {
        foreach ($itemTransfers as $itemTransfer) {
            if ($itemTransfer->getShipmentType() === null) {
                continue;
            }

            $shipmentTypeUuid = $itemTransfer->getShipmentTypeOrFail()->getUuidOrFail();
            $itemTransfer->getShipmentOrFail()->setShipmentTypeUuid($shipmentTypeUuid);
        }

        return $itemTransfers;
    }
}
