<?php

use App\User;

function current_user() : User
{
    return auth()->user();
}
