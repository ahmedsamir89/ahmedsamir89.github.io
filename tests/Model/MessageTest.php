<?php

namespace Tests\Model;

use App\Model\Message;
use Tests\Model\Base\BaseCase;

class MessageTest extends BaseCase
{

    /**
     * @throws \ReflectionException
     * @author Ahmed Samir
     */
    public function testMessageVars()
    {
        $message = new Message();
        $reflect = new \ReflectionClass($message);
        $props   = $reflect->getProperties();
        $expected = ['from', 'to', 'content', 'UDH'];

        /** @var \ReflectionProperty $prop */
        foreach ($props as $prop) {
            $this->assertContains($prop->getName(), $expected);
        }
    }
}