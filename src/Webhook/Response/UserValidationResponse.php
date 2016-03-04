<?php

namespace Xsolla\SDK\Webhook\Response;

use Xsolla\SDK\API\XsollaClient;
use Xsolla\SDK\Webhook\WebhookResponse;

class UserValidationResponse extends WebhookResponse
{
    /**
     * UserValidationResponse constructor.
     * @param string      $userId
     * @param string|null $userEmail
     * @param string|null $userPhone
     * @param string|null $userCountry
     */
    public function __construct($userId, $userEmail = null, $userPhone = null, $userCountry = null)
    {
        $this->validateStringParameter('User id', $userId);
        parent::__construct(
            200,
            XsollaClient::jsonEncode($this->buildResponse($userId, $userEmail, $userPhone, $userCountry))
        );
    }

    private function buildResponse($userId, $userEmail, $userPhone, $userCountry)
    {
        $response = array('user_id' => $userId);
        if ($userEmail) {
            $response['email'] = $userEmail;
        }
        if ($userPhone) {
            $response['phone'] = $userPhone;
        }
        if ($userCountry) {
            $response['country'] = $userCountry;
        }

        return $response;
    }
}
