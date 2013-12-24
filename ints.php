<?php

require_once __DIR__.'/vendor/autoload.php';

$set = new Idatha\Set();

$set->add(1);
$set->add(2);

ld($set->isMember(1), $set->isMember(2), $set->isMember(3));

$set2 = new Idatha\Set();
$set2->add(1);
$set2->add(2);

ld($set->isSubset($set2), $set->isSubset($set2, true));

$set3 = new Idatha\Set();
$set3->add(2);
$set3->add(3);
$set3->add(4);

ld($set->union($set3)->toArray());