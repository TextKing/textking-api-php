<?php

namespace TextKing\Model;

class Document {

    /** @var string */
    private $name;

    /** @var resource */
    private $stream;

    /** @var string */
    private $contentType;

    /**
     * @param string $name
     * @param resource $stream
     * @param string $contentType
     */
    public function __construct($name, $stream, $contentType)
    {
        $this->name = $name;
        $this->stream = $stream;
        $this->contentType = $contentType;
    }

    /**
     * @param $text
     * @param string $name
     * @return Document
     */
    public static function createFromString($text, $name="document.txt")
    {
        $stream = fopen('php://memory','r+');
        fwrite($stream, $text);
        rewind($stream);
        return new static($name, $stream, "text/plain");
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return resource
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }
} 