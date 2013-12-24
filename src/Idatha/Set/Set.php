<?php

namespace Idatha\Set;

use Idatha\Set\AdapterInterface;
use Idatha\Set\Adapter;

class Set
{

    protected $adapter;

    protected $initialized;

    protected $data;


    public function __construct(AdapterInterface $adapter = null)
    {
        if (!is_null($adapter)) {
            $this->adapter = $adapter;
            $this->data = $this->adapter->initialize();
            $this->initialized = true;
        } else {
            $this->initialized = false;
        }
    }

    protected function initialize($firstElement)
    {
        $this->adapter = is_object($firstElement) ? new Adapter\ObjectSet() : new Adapter\SimpleTypeSet();
        $this->data = $this->adapter->initialize();
        $this->initialized = true;
    }

    /**
     * Adds a new element into the set.
     * @param mixed $element
     */
    public function add($element)
    {
        if (!$this->initialized) {
            $this->initialize($element);
        }

        $this->data = $this->adapter->add($this->data, $element);
    }

    public function remove($element)
    {
        $this->data = $this->adapter->remove($this->data, $element);
    }

    public function isMember($element)
    {
        return $this->adapter->isMember($this->data, $element);
    }

    public function union(Set $set)
    {
        $newSet = new self($this->adapter);
        $newSet->data = $this->adapter->union($this->data, $set);

        return $newSet;
    }

    public function intersection(Set $set)
    {
        $newSet = new self($this->adapter);
        $newSet->data = $this->adapter->intersection($this->data, $set);

        return $newSet;
    }

    public function complement(Set $set)
    {
        $newSet = new self($this->adapter);
        $newSet->data = $this->adapter->complement($this->data, $set);

        return $newSet;
    }

    public function getRawData()
    {
        return $this->data;
    }

    public function toArray()
    {
        return $this->adapter->toArray($this->data);
    }

    public function count()
    {
        return $this->adapter->count($this->data);
    }

    public function isEmpty()
    {
        return $this->adapter->isEmpty($this->data);
    }

    public function isSubset(Set $set, $strict = false)
    {
        return $this->adapter->isSubset($this->data, $set, $strict);
    }
}