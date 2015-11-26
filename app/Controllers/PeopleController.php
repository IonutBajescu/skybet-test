<?php

namespace App\Controllers;

use App\Models\People;

class PeopleController
{
    /**
     * @var People
     */
    private $people;

    public function __construct(People $people)
    {
        $this->people = $people;
        $this->people->arise();
    }

    public function showForm()
    {
        return json_encode($this->people);
    }

    public function submitForm()
    {
        // The php://input trick wasn't used for backwards compatibility reasons.
        $this->people->fill($_POST['people'])->save();
        return json_encode($this->people);
    }
}