<?php
/*
 * TEXTKING API bindings for PHP
 * Copyright (C) 2013 TEXTKING Deutschland GmbH (https://www.textking.com)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace TextKing\Model;

class Document
{
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
    public function __construct($stream, $name, $contentType)
    {
        $this->name = $name;
        $this->stream = $stream;
        $this->contentType = $contentType;
    }

    /**
     * @param string $text
     * @param string $name
     * @return Document
     */
    public static function createFromString($text, $name='document.txt')
    {
        $stream = fopen('php://memory', 'r+');
        fwrite($stream, $text);
        rewind($stream);
        return new static($stream, $name, 'text/plain');
    }

    /**
     * @param resource $stream
     * @param string $name
     * @param string $contentType
     * @return Document
     */
    public static function createFromStream($stream, $name, $contentType)
    {
        $dest = fopen('php://memory', 'r+');
        stream_copy_to_stream($stream, $dest);
        rewind($dest);
        return new static($dest, $name, $contentType);
    }

    /**
     * @param array $uploadedFile
     * @param string $name
     * @return Document
     */
    public static function createFromUpload($uploadedFile)
    {
        if (!is_uploaded_file($uploadedFile['tmp_name'])) {
            throw new \Exception(
                "The file " . $uploadedFile['tmp_name'] . " is not an uploaded file");
        }

        $stream = fopen($uploadedFile['tmp_name'], 'r+');
        return new static($stream, $uploadedFile['name'], $uploadedFile['type']);
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