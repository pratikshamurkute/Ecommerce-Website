<?php

namespace Razorpay\Api;

use ArrayAccess;
use ArrayIterator;
use IteratorAggregate;

class Resource implements ArrayAccess, IteratorAggregate
{
    protected $attributes = array();

    /**
     * Summary of getIterator
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->attributes);
    }

    /**
     * Summary of offsetExists
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return (isset($this->attributes[$offset]));
    }

    /**
     * Summary of offsetSet
     * @param mixed $offset
     * @param mixed $value
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->attributes[$offset] = $value;
    }

    /**
     * Summary of offsetGet
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->attributes[$offset];
    }

    /**
     * Summary of offsetUnset
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }

    /**
     * Summary of __get
     * @param mixed $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->attributes[$key];
    }

    /**
     * Summary of __set
     * @param mixed $key
     * @param mixed $value
     * @return mixed
     */
    public function __set($key, $value)
    {
        return $this->attributes[$key] = $value;
    }

    /**
     * Summary of __isset
     * @param mixed $key
     * @return bool
     */
    public function __isset($key)
    {
        return (isset($this->attributes[$key]));
    }

    public function __unset($key)
    {
        unset($this->attributes[$key]);
    }
}