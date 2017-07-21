<?php

/*
 * This file is part of Mailinator PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Mailinator;

use BrianFaust\Http\Http;

class Client
{
    /**
     * @var string
     */
    private $token;

    /**
     * Create a new client instance.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Create a new API service instance.
     *
     * @param string $name
     *
     * @return \BrianFaust\Mailinator\API\AbstractAPI
     */
    public function api(string $name): API\AbstractAPI
    {
        $client = Http::withBaseUri("https://api.mailinator.com/api/?token={$this->token}");

        $class = "BrianFaust\\Mailinator\\API\\{$name}";

        return new $class($client);
    }
}
