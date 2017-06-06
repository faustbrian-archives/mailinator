<?php

/*
 * This file is part of Mailinator PHP Client.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Mailinator\Api;

use BrianFaust\Unified\AbstractApi;
use BrianFaust\Mailinator\Models\Message;

class Mail extends AbstractApi
{
    public function publicInbox($to)
    {
        $response = $this->get('inbox', compact('to'));

        return $this->getMapper()->raw($response['messages']);
    }

    public function privateInbox()
    {
        $response = $this->get('inbox');

        return $this->getMapper()->raw($response['messages']);
    }

    public function message($msgid)
    {
        $response = $this->get('email', compact('msgid'));

        return $this->getMapper()->raw($response['data']);
    }
}
