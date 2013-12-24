<?php

namespace Idatha;

use Ladybug\Plugin\Extra\Inspector\Object\Php\SplStack;

class Stack
{
    private $splAvailable;

    protected $data;

    public function __construct()
    {
        $this->splAvailable = version_compare(phpversion(), '5.3.0', '>=');

        if ($this->splAvailable) {
            $this->data = new \SplStack();
        } else {
            $this->data = array();
        }
    }

    public function push($element)
    {
        if ($this->splAvailable) {
            $this->data->push($element);
        } else {
            array_push($this->data, $element);
        }
    }

    public function pop()
    {
        if ($this->splAvailable) {
            return $this->data->pop();
        } else {
            return array_pop($this->data);
        }
    }


}