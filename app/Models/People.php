<?php

namespace App\Models;

/**
 * @package App\Models
 */
class People
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
        file_put_contents($this->getFile(), json_encode($this->attributes));
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
}