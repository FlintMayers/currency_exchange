<?php

namespace AppBundle\Service;

/**
 * Class CurrencyExchange
 * @package AppBundle\Service
 */
class CurrencyExchange
{
    /**
     * @param $amount
     * @return int
     */
    public function leastAmountOfNotes($amount)
    {
        if (!is_int($amount) || $amount <= 0) {
            return 0;
        }

        $minNoteCount = 0;

        $availableDenominations = [500, 100, 50, 20, 10, 5, 1];

        foreach ($availableDenominations as $index => $denomination) {

            if ($amount >= $denomination) {

                $remainder = $amount % $denomination;

                $noteCount = ($amount - $remainder) / $denomination;

                $minNoteCount+= $noteCount;

                $amount-= $noteCount * $denomination;
            }
        }

        return $minNoteCount;
    }
}