<?php

namespace Xsolla\SDK\Tests\Webhook\Message;

use Xsolla\SDK\Webhook\Message\UserValidationMessage;

/**
 * @group unit
 */
class UserValidationMessageTest extends \PHPUnit_Framework_TestCase
{
    public function testUserId()
    {
        $request = array(
            'user' => array(
                'id' => '1234567',
            ),
            'notification_type' => 'user_validation',
        );
        $message = new UserValidationMessage($request);
        static::assertSame($request['user'], $message->getUser());
        static::assertSame($request['user']['id'], $message->getUserId());
        static::assertSame(null, $message->getUserPublicId());
    }

    public function testUserPublicId()
    {
        $request = array(
            'user' => array(
                'public_id' => '1234567',
            ),
            'notification_type' => 'user_validation',
        );
        $message = new UserValidationMessage($request);
        static::assertSame($request['user'], $message->getUser());
        static::assertSame(null, $message->getUserId());
        static::assertSame($request['user']['public_id'], $message->getUserPublicId());
    }
}
