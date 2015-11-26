<?php

namespace App\Controllers;

use App\Models\People;

class PeopleController extends AbstractController
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
        $form = $this->people->getAttributes();
        return $this->view('form', compact('form'));
    }

    public function submitForm()
    {
        $this->people->fill($_POST['people'])->save();

        return back();
    }
}