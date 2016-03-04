<?php

namespace Xsolla\SDK\Webhook\Message;

class UserValidationMessage extends Message
{
    /**
     * @return string
     */
    public function getUserPublicId()
    {
        if (array_key_exists('public_id', $this->request['user'])) {
            return $this->request['user']['public_id'];
        }
    }
}
