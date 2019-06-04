<?php

declare(strict_types=1);

/*
 * This file is part of Mailinator PHP Client.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plients\Mailinator\API;

use Plients\Http\HttpResponse;
use Plients\Mailinator\Models\Message;

class Mail extends AbstractAPI
{
    public function publicInbox(string $to): HttpResponse
    {
        return $this->client->get('inbox', compact('to'));
    }

    public function privateInbox(): HttpResponse
    {
        return $this->client->get('inbox');
    }

    public function message(string $msgid): HttpResponse
    {
        return $this->client->get('email', compact('msgid'));
    }
}
