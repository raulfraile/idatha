<?php

namespace Idatha\Set;

use Idatha\Set\Set;

interface AdapterInterface
{

    public function initialize();

    public function add($currentData, $element);

    public function remove($currentData, $element);

    public function isMember($currentData, $element);

    public function union($currentData, Set $element);

    public function intersection($currentData, Set $element);

    public function complement($currentData, Set $element);

    public function toArray($currentData);

    public function count($currentData);
}