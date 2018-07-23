<?php


namespace App\Model;


class MessageCollection implements \Iterator
{

    private $array = [];

    public function __construct(array $array)
    {
        $this->array = $array;
        $this->validateArray();
    }

    /**
     * Return the current element
     * @return \App\Model\Message
     * @author Ahmed Samir <ahmed.samir@tajawal.com>
     */
    public function current(): Message
    {
        return current($this->array);
    }

    /**
     * forward to next element
     * @author Ahmed Samir <ahmed.samir@tajawal.com>
     */
    public function next()
    {
        return next($this->array);
    }

    /**
     * Return the key of the current element
     * @return int|null
     * @author Ahmed Samir <ahmed.samir@tajawal.com>
     */
    public function key(): ?int
    {
        return key($this->array);
    }

    /**
     * Checks if current position is valid
     * @return bool
     * @author Ahmed Samir <ahmed.samir@tajawal.com>
     */
    public function valid()
    {
        $currentKey = $this->key() ;
        return null !== $currentKey && false !== $currentKey;
    }

    /**
     * reset the Iterator to the first element
     * @author Ahmed Samir <ahmed.samir@tajawal.com>
     */
    public function rewind()
    {
        reset($this->array);
    }

    /**
     *  count of the elements
     * @return int
     * @author Ahmed Samir <ahmed.samir@tajawal.com>
     */
    public function count(): int
    {
        return count($this->array);
    }

    /**
     * @throws \Exception
     * @author Ahmed Samir
     */
    private function validateArray()
    {
        foreach ($this->array as $value) {
            if(!$value instanceof Message) {
                throw new \Exception('Wrong type for array. you should only send array of Message object');
            }
        }
    }
}