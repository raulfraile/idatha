<?php

require_once __DIR__.'/vendor/autoload.php';

$set = new Idatha\Set\Set(new \Idatha\Set\Adapter\ObjectSet());


$element1 = new stdClass(1);
$element2 = new stdClass(2);
$element3 = new stdClass(3);
$element4 = new stdClass(4);
$element5 = new stdClass(5);

$set->add($element1);
$set->add($element2);

ld($set->isMember($element1), $set->isMember($element2), $set->isMember(new stdClass(1)));

$set2 = new Idatha\Set\Set(new \Idatha\Set\Adapter\ObjectSet());

$set2->add($element2);
$set2->add($element3);
$set2->add($element4);

ld($set->union($set2)->toArray());
ld($set->intersection($set2)->toArray());
ld($set2->complement($set)->toArray());

ld($set->isSubset($set2));


ld($set->isMember($element1), $set->isMember($element2), $set->isMember(new stdClass(1)));
$subset = new Idatha\Set\Set(new \Idatha\Set\Adapter\ObjectSet());
$subset->add($element1);
$subset->add($element2);

ld($set->isMember($element1), $set->isSubset($subset), $set->isSubset($subset, true));