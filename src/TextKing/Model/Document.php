<?php

namespace TextKing\Model;

class Document {

    private $name;

    private $stream;

    private $contentType;

    public function __construct($name, $stream, $contentType)
    {
        $this->name = $name;
        $this->stream = $stream;
        $this->contentType = $contentType;
    }

    public static function createFromString($text, $name="document.txt")
    {
        $stream = fopen('php://memory','r+');
        fwrite($stream, $text);
        rewind($stream);
        return new Document($name, $stream, "text/plain");
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStream()
    {
        return $this->stream;
    }

    public function getContentType()
    {
        return $this->contentType;
    }
} 