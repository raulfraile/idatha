<?php

namespace Idatha\Set\Adapter;

use Idatha\Set\AdapterInterface;
use Idatha\Set\Set;

class ObjectSet implements AdapterInterface
{

    public function initialize()
    {
        return new \SplObjectStorage();
    }

    public function add($currentData, $element)
    {
        /** @var \SplObjectStorage $currentData */

        $currentData->attach($element);

        return $currentData;
    }

    public function remove($currentData, $element)
    {
        /** @var \SplObjectStorage $currentData */

        $currentData->detach($element);

        return $currentData;
    }

    public function isMember($currentData, $element)
    {
        /** @var \SplObjectStorage $currentData */

        return $currentData->contains($element);
    }

    public function isEmpty($currentData)
    {
        /** @var \SplObjectStorage $currentData */

        return $currentData->count() === 0;
    }

    public function isSubset($currentData, Set $set, $strict)
    {
        /** @var \SplObjectStorage $currentData */

        $iterator = $set->getRawData();
        $iterator->rewind();
        while ($iterator->valid()) {
            if (!$currentData->contains($iterator->current())) {
                return false;
            }

            $iterator->next();
        }

        return !$strict || $currentData->count() != $iterator->count();
    }

    public function union($currentData, Set $set)
    {
        /** @var \SplObjectStorage $currentData */

        $newSet = clone($currentData);
        $newSet->addAll($set->getRawData());

        return $newSet;
    }

    public function intersection($currentData, Set $set)
    {
        /** @var \SplObjectStorage $currentData */

        $newSet = clone($currentData);
        $newSet->removeAllExcept($set->getRawData());

        return $newSet;
    }

    public function complement($currentData, Set $set)
    {
        /** @var \SplObjectStorage $currentData */

        $newSet = clone($currentData);
        $newSet->removeAll($set->getRawData());

        return $newSet;
    }

    public function toArray($currentData)
    {
        return iterator_to_array($currentData);
    }

    public function count($currentData)
    {
        return $currentData->count();
    }


}