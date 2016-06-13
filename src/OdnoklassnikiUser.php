<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 11/06/16
 * Time: 01:35
 */

namespace Max107\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class OdnoklassnikiUser implements ResourceOwnerInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @param  array $response
     */
    public function __construct(array $response)
    {
        $this->data = $response;
    }

    /**
     * Returns the identifier of the authorized resource owner.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->data['uid'];
    }

    public function getFirstName()
    {
        return $this->data['first_name'];
    }

    public function getLastName()
    {
        return $this->data['last_name'];
    }

    public function getGender()
    {
        return $this->data['gender'];
    }

    public function getName()
    {
        return $this->data['name'];
    }

    public function getImageUrl()
    {
        return $this->data['pic_3'];
    }

    public function getLocale()
    {
        return $this->data['locale'];
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}