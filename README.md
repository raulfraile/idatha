Idatha
======

Data structures library for PHP

```
$set = new Idatha\Set();

$set->add(1);
$set->add(2);

var_dump($set->isMember(1)); // true
var_dump($set->isMember(3)); // false

$set2 = new Idatha\Set();
$set->add(2);
$set->add(3);
$set->add(4);

var_dump($set->union($set2)->toArray()); // array(1,2,3,4)
var_dump($set->intersection($set2)->toArray()); // array(2)
var_dump($set2->complement($set)->toArray()); // array(3,4)
var_dump($set->isSubset($set2)); // false
```