<?php

namespace Max107\OAuth2\Client\Test\Provider;

use League\OAuth2\Client\Token\AccessToken;
use Max107\OAuth2\Client\Provider\OdnoklassnikiUser;

/**
 * Class OdnoklassnikiTest
 * @package Max107\OAuth2\Client\Test\Provider
 * @property \Max107\OAuth2\Client\Provider\Odnoklassniki provider
 */
class OdnoklassnikiTest extends \PHPUnit_Framework_TestCase
{
    protected $response;
    protected $provider;
    protected $token;

    protected function setUp()
    {
        $this->response = json_decode('{"uid":"12345678901","first_name":"First","last_name":"Last",'
            .'"name":"First Last","locale":"ru","gender":"male","pic_3":"http://mock.ph/oto.jpg","location":'
            .'{"city":"Тольятти","country":"RUSSIAN_FEDERATION","countryCode":"RU","countryName":"Россия"}}', true);
        $this->provider = new \Max107\OAuth2\Client\Provider\Odnoklassniki([
            'clientId' => 'mock',
            'clientPublic' => 'mock_public',
            'clientSecret' => 'mock_secret',
            'redirectUri' => 'none',
        ]);
        $this->token = new AccessToken([
            'access_token' => 'mock_token',
        ]);
    }

    public function testUrlUserDetails()
    {
        $query = parse_url($this->provider->getResourceOwnerDetailsUrl($this->token), PHP_URL_QUERY);
        parse_str($query, $param);

        $this->assertEquals($this->token->getToken(), $param['access_token']);
        $this->assertEquals($this->provider->clientPublic, $param['application_key']);
        $this->assertNotEmpty($param['sig']);
    }

    public function testUserDetails()
    {
        $user = new OdnoklassnikiUser($this->response);
        $this->assertInstanceOf(OdnoklassnikiUser::class, $user);
        $this->assertEquals($this->response['uid'], $user->getId());
        $this->assertEquals($this->response['name'], $user->getName());
        $this->assertEquals($this->response['locale'], $user->getLocale());
        $this->assertEquals($this->response['gender'], $user->getGender());
        $this->assertEquals($this->response['first_name'], $user->getFirstName());
        $this->assertEquals($this->response['last_name'], $user->getLastName());
        $this->assertEquals($this->response['pic_3'], $user->getImageUrl());
    }
}
