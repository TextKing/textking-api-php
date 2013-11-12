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

namespace TextKing\Service;

use Guzzle\Http\Message\RequestInterface;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Command\LocationVisitor\Request\AbstractRequestVisitor;
use Guzzle\Service\Description\Parameter;

/**
 * Visitor used to set a parameter as JSON encoded body.
 */
class JsonBodyVisitor extends AbstractRequestVisitor
{
    /** @var string The content type (default is "application/json") */
    protected $jsonContentType = 'application/json';

    /**
     * Set the Content-Type header to add to the request if JSON is added to the body.
     *
     * @param string $header Header to set when JSON is added (e.g. application/json)
     *
     * @return self
     */
    public function setContentTypeHeader($header = 'application/json')
    {
        $this->jsonContentType = $header;
        return $this;
    }

    public function visit(
        CommandInterface $command,
        RequestInterface $request,
        Parameter $param,
        $value
    ) {
        // Don't overwrite the Content-Type if one is set
        if ($this->jsonContentType && !$request->hasHeader('Content-Type')) {
            $request->setHeader('Content-Type', $this->jsonContentType);
        }

        $request->setBody(json_encode($value));
    }
}
