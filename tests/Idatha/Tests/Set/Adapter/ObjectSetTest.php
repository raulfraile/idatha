<?php

namespace Idatha\Tests\Set\Adapter;

use Idatha\Set\Adapter\ObjectSet;

class ObjectSetTest extends \PHPUnit_Framework_TestCase
{

    /** @var ObjectSet $adapter */
    protected $adapter;

    public function setUp()
    {
        $this->adapter = new ObjectSet();
    }

    public function testSetIsEmpty()
    {
        $data = new \SplObjectStorage();

        $this->assertTrue($this->adapter->isEmpty($data));
    }

}