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

namespace TextKing;

/**
 * This class helps implementing the OAuth 2 authentication flow.
 */
class OAuthHelper
{
	/** @var string */
    private $baseUrl = 'https://www.textking.com/oauth/';

	/** @var string */
    private $authorizeUrl = 'authorize';

	/** @var string */
    private $tokenUrl = 'token';

	/** @var string */
    private $clientId;

	/** @var string */
    private $clientSecret;

	/** @var string */
    private $redirectUri;
    
    /** @var \Guzzle\Http\Client */
    private $client = null;

    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param string $redirectUri
     */
    public function __construct($clientId, $clientSecret, $redirectUri)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
    }

	/**
     * @param string $state
     * @return string
     */
    public function getAuthorizeUrl($state = null)
    {
        $queryData = array(
            'response_type' => 'code',
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri
        );

        if ($state != null) {
            $queryData['state'] = $state;
        }

        $queryString = http_build_query($queryData);
        return $this->baseUrl . $this->authorizeUrl . '?' . $queryString;
    }

    /**
     * @param string $code
     * @param bool $neverExpire
     * @return array
     */
    public function getAccessToken($code, $neverExpire = false)
    {
        $data = array(
            'grant_type' => 'authorization_code',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code' => $code,
            'redirect_uri' => $this->redirectUri
        );

        if ($neverExpire) {
            $data['offline_access'] = 1;
        }

        return $this->sendTokenRequest($data);
    }
    
    /**
     * @param string $refreshToken
     * @return array
     */
    public function getRefreshToken($refreshToken)
    {
        $data = array(
            'grant_type' => 'refresh_token',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'refresh_token' => $refreshToken
        );

        return $this->sendTokenRequest($data);
    }
    
    /**
     * @param array $data
     * @return array
     */
    private function sendTokenRequest($data)
    {
		if ($this->client == null) {
			$this->client = new \Guzzle\Http\Client($this->baseUrl);
		}
		
        $request = $this->client->post($this->tokenUrl, null, $data);
        $response = $request->send();
        return $response->json();
	}
} 
