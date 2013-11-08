<?php

namespace TextKing\Guzzle;

use Guzzle\Http\Message\RequestInterface;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Description\Parameter;

/**
 * Visitor used to set a parameter as JSON encoded body.
 */
class JsonBodyVisitor extends \Guzzle\Service\Command\LocationVisitor\Request\AbstractRequestVisitor
{
    /** @var bool Whether or not to add a Content-Type header when JSON is found */
    protected $jsonContentType = 'application/json';

    /**
     * Set the Content-Type header to add to the request if JSON is added to the body. This visitor does not add a
     * Content-Type header unless you specify one here.
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

    public function visit(CommandInterface $command, RequestInterface $request, Parameter $param, $value)
    {
        // Don't overwrite the Content-Type if one is set
        if ($this->jsonContentType && !$request->hasHeader('Content-Type')) {
            $request->setHeader('Content-Type', $this->jsonContentType);
        }

        $request->setBody(json_encode($value->toArray()));
    }
}
