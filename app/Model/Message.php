<?php

namespace App\Model;

class Message
{
    /** @var string $content */
    private $content;

    /** @var array $to */
    private $to = [];

    /** @var string $from */
    private $from;

    /** @var string $UDH */
    private $UDH = null;

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom(string $from): void
    {
        $this->from = $from;
    }


    /**
     * @return string
     */
    public function getTo(): array
    {
        return $this->to;
    }

    /**
     * @param array $to
     *
     */
    public function setTo(array $to): void
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getUDH(): string
    {
        return $this->UDH;
    }

    /**
     * @param string $UDH
     */
    public function setUDH(?string $UDH): void
    {
        $this->UDH = $UDH;
    }

}