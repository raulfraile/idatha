<?php

namespace Idatha\Tests\Set\Adapter;

use Idatha\Set\Adapter\SimpleTypeSet;

class SimpleTypeSetTest extends \PHPUnit_Framework_TestCase
{

    /** @var SimpleTypeSet $adapter */
    protected $adapter;

    public function setUp()
    {
        $this->adapter = new SimpleTypeSet();
    }

    public function testSetIsEmpty()
    {
        $data = array();

        $this->assertTrue($this->adapter->isEmpty($data));
    }

    public function testAddingAnElementIncrementsTheCounter()
    {
        $data = array();
        $this->assertEquals(0, $this->adapter->count($data));

        $data = $this->adapter->add($data, 1);
        $this->assertEquals(1, $this->adapter->count($data));
    }

}