<?php

namespace Idatha\Set;

use Idatha\Set\Set;

interface AdapterInterface
{

    /**
     * Initializes underlying data structure.
     * @return mixed
     */
    public function initialize();

    /**
     * Adds a new element into the data structure.
     * @param mixed $currentData
     * @param mixed $element
     *
     * @return bool Returns TRUE if the element has been added.
     */
    public function add($currentData, $element);

    /**
     * Removes an element from the data structure.
     * @param mixed $currentData
     * @param mixed $element
     *
     * @return mixed
     */
    public function remove($currentData, $element);

    /**
     * Checks whether the element is a member of the data structure.
     * @param $currentData
     * @param $element
     *
     * @return mixed
     */
    public function isMember($currentData, $element);

    /**
     * Checks whether the data structure is empty.
     * @param $currentData
     *
     * @return bool Returns TRUE is the data structure is empty.
     */
    public function isEmpty($currentData);

    /**
     * Performs a union between the two data structures.
     * @param mixed $currentData
     * @param Set   $set
     *
     * @return mixed The new data structure
     */
    public function union($currentData, Set $set);

    /**
     * Performs a intersection between the two data structures.
     * @param mixed $currentData
     * @param Set   $set
     *
     * @return mixed The new data structure
     */
    public function intersection($currentData, Set $set);

    /**
     * Performs a complement between the two data structures.
     * @param mixed $currentData
     * @param Set   $set
     *
     * @return mixed The new data structure
     */
    public function complement($currentData, Set $set);

    /**
     * Gets the data structure as an array.
     * @param $currentData
     * @return mixed
     */
    public function toArray($currentData);

    /**
     * Counts the elements of the data structure
     * @param $currentData
     * @return mixed
     */
    public function count($currentData);
}