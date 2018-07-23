<?php

namespace Tests\Model;
use App\Model\Message;
use App\Model\MessageCollection;

/**
 * Handle number of msgs , create udh
 * Class MessageHandler
 *
 *
 * @package Tests\Model
 *
 */
class MessageHandler
{

    /**
     * @var string
     */
    private $from;
    /**
     * @var array
     */
    private $to = [];
    /**
     * @var string
     */
    private $content;


    public function __construct(string $from, array $to, string $content)
    {
        $this->from = $from;
        $this->to = $to;
        $this->content = $content;
    }

    /**
     * @return \App\Model\MessageCollection
     * @author Ahmed Samir
     */
    public function getMessages(): MessageCollection
    {
        $messages = [];
        $strLen   = strlen($this->content);

        if($strLen <= Constant::NUMBER_OF_CHARS_PER_MSG) {

            $messages[] = $this->getMessage($this->content, null);
        } else {

          $numOfMessages = ceil($strLen / Constant::NUMBER_OF_CHARS_PER_MSG);
          $reference = rand(10, 99);
          for ($i = 0; $i < $numOfMessages; $i++) {
              $start = Constant::NUMBER_OF_CHARS_PER_MSG * $i;
              $messageNumber = $i+1;
              $content = substr($this->content, $start ,Constant::NUMBER_OF_CHARS_PER_MSG);
              $messages [] = $this->getMessage($content, $this->getUDH($reference, $numOfMessages, $messageNumber));
          }

        }
        return new MessageCollection($messages);

    }


    /**
     * @param string      $content
     * @param null|string $udh
     *
     * @return \App\Model\Message
     * @author Ahmed Samir
     */
    private function getMessage(string $content, ?string $udh): Message
    {
        $msg = new Message();
        $msg->setFrom($this->from);
        $msg->setTo($this->to);
        $msg->setContent($content);
        $msg->setUDH($udh);
        return $msg;
    }


    /**
     * @param string $reference
     * @param string $numberOfMessages
     * @param string $messageNumber
     *
     * @return string
     * @author Ahmed Samir
     */
    private function getUDH(string $reference, string $numberOfMessages, string $messageNumber): string
    {
        $numberOfMessages = strlen($numberOfMessages) == 1 ? "0{$numberOfMessages}" : $numberOfMessages;
        $messageNumber    = strlen($messageNumber) == 1 ? "0{$messageNumber}" : $messageNumber;
        return "050003{$reference}{$numberOfMessages}{$messageNumber}";
    }
}