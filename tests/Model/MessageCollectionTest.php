<?php

namespace Tests\Model;

use App\Model\Message;
use App\Model\MessageCollection;
use Tests\Model\Base\BaseCase;

class MessageCollectionTest extends BaseCase
{

    public function testArrayPassedShouldBeArrayOfMessages()
    {
        $stringArray = ['ss', 'xx', 'yy'];
        $this->expectExceptionMessage("Wrong type for array. you should only send array of Message object");
        $messageIterator = new MessageCollection($stringArray);

        $message = new Message();
        $messageCollection = new MessageCollection([$message]);
        $this->assertCount(1, $messageCollection);
    }

    /**
     * @dataProvider countData
     * @param \App\Model\MessageCollection $messageCollection
     * @param int                          $expected
     *
     * @author Ahmed Samir <ahmed.samir@tajawal.com>
     */
    public function testRightCountFunction(MessageCollection $messageCollection, int $expected)
    {
        $this->assertCount($expected, $messageCollection);
    }

    /**
     * @dataProvider countData
     * @param \App\Model\MessageCollection $messageCollection
     *
     * @author Ahmed Samir <ahmed.samir@tajawal.com>
     */
    public function testWrongCountFunction(MessageCollection $messageCollection)
    {
        $this->assertNotEquals(4, $messageCollection);
    }

    public function countData()
    {
        return [
            [$this->generateCollectionOfMsgs(0), 0],
            [$this->generateCollectionOfMsgs(1), 1],
            [$this->generateCollectionOfMsgs(2), 2],
            [$this->generateCollectionOfMsgs(3), 3],
        ];
    }


    /**
     * @param int $number
     *
     * @return array
     * @author Ahmed Samir <ahmed.samir@tajawal.com>
     */
    protected function generateCollectionOfMsgs(int $number)
    {
        $array = [];
        for ($i = 0; $i < $number; $i++) {
            $array[] = new Message();
        }

        return new MessageCollection($array);
    }

}