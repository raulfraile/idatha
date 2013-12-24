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

}