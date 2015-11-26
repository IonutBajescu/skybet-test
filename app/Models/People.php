<?php

namespace App\Models;

/**
 * @package App\Models
 */
class People implements \JsonSerializable
{
    /**
     * @var array
     */
    protected $attributes = [];

    /**
     * @param  array $attributes
     * @return $this
     */
    public function fill(array $attributes)
    {
        $this->attributes = $attributes + $this->attributes;
        return $this;
    }

    /**
     * Arise the model from its dead(json) state.\
     *
     * @return $this
     */
    public function arise()
    {
        return $this->fill(
            json_decode(
                file_get_contents($this->getFile()),
                true
            )
        );
    }

    /**
     * Save the model.
     */
    public function save()
    {
        // No SQL escaping, this is JSON not MySQL.
        file_put_contents($this->getFile(), json_encode($this));
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return base_path('storage/people.json');
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *        which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return $this->attributes;
    }
}