<?php

return [
    'firstName' => ['required'],
    'lastName' => ['required'],
    'email' => ['required', 'email', 'unique'],
    'password' => ['required', 'min:5', 'unique', 'password']
];