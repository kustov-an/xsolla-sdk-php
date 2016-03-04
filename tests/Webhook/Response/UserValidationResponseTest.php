<?php

namespace Xsolla\SDK\Tests\Webhook\Message;

use Xsolla\SDK\Webhook\Response\UserValidationResponse;

/**
 * @group unit
 */
class UserValidationResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testUserIdHasInvalidType()
    {
        $this->setExpectedException(
            '\Xsolla\SDK\Exception\Webhook\XsollaWebhookException',
            'User id should be non-empty string. stdClass given'
        );
        new UserValidationResponse(new \StdClass());
    }

    public function testUserIdIsEmptyString()
    {
        $this->setExpectedException(
            '\Xsolla\SDK\Exception\Webhook\XsollaWebhookException',
            'User id should be non-empty string. Empty string given'
        );
        new UserValidationResponse('');
    }

    public function testUserIdIsNull()
    {
        $this->setExpectedException(
            '\Xsolla\SDK\Exception\Webhook\XsollaWebhookException',
            'User id should be non-empty string. NULL given'
        );
        new UserValidationResponse(null);
    }

    public function testShortResponseFormat()
    {
        $response = new UserValidationResponse('user_id');
        $this->assertJsonStringEqualsJsonString(
            '{"user_id":"user_id"}',
            $response->getSymfonyResponse()->getContent()
        );
    }

    public function testFullResponseFormat()
    {
        $response = new UserValidationResponse('user_id', 'user_email', 'user_phone', 'user_country');
        $this->assertJsonStringEqualsJsonString(
            '{"user_id":"user_id","email":"user_email","phone":"user_phone","country":"user_country"}',
            $response->getSymfonyResponse()->getContent()
        );
    }
}
