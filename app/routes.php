<?php

// If it was a normal application, I'll certainly use a framework.
// However, for the sake of clearness I won't do it now.

use App\Controllers\PeopleController;
use App\Models\People;

if ($_SERVER['REQUEST_URI'] == '/' && $_SERVER['REQUEST_METHOD'] == 'GET') {
    return (new PeopleController(new People))->showForm();
}


if ($_SERVER['REQUEST_URI'] == '/' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    return (new PeopleController(new People))->submitForm();
}
