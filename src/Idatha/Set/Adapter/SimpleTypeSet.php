<?php

namespace Idatha\Set\Adapter;

use Idatha\Set\AdapterInterface;
use Idatha\Set\Set;

class SimpleTypeSet implements AdapterInterface
{

    public function initialize()
    {
        return array();
    }

    public function add($currentData, $element)
    {
        /** @var array $currentData */

        $currentData[$element] = true;

        return $currentData;
    }

    public function remove($currentData, $element)
    {
        /** @var array $currentData */

        unset($currentData[$element]);

        return $currentData;
    }

    public function isMember($currentData, $element)
    {
        /** @var array $currentData */

        return isset($currentData[$element]);
    }

    public function isEmpty($currentData)
    {
        /** @var array $currentData */

        return empty($currentData);
    }

    public function isSubset($currentData, Set $set, $strict)
    {
        /** @var array $currentData */

        $elements = $set->getRawData();
        reset($elements);
        while (list($key, $value) = each($elements)) {
            if (!$this->isMember($elements, $value)) {
                return false;
            }
        }

        return !$strict || count($currentData) != count($elements);
    }

    public function union($currentData, Set $set)
    {
        /** @var array $currentData */

        $newSet = $currentData + $set->getRawData();

        return $newSet;
    }

    public function intersection($currentData, Set $set)
    {
        /** @var \SplObjectStorage $currentData */

        $newSet = array_intersect_key($currentData, $set->getRawData());

        return $newSet;
    }

    public function complement($currentData, Set $set)
    {
        /** @var \SplObjectStorage $currentData */

        $newSet = array_diff_key($currentData, $set->getRawData());

        return $newSet;
    }

    public function toArray($currentData)
    {
        return array_keys($currentData);
    }

    public function count($currentData)
    {
        return count($currentData);
    }


}