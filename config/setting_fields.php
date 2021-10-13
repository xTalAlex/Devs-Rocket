<?php

    return [


        'app' => [

            /*
                Meta information
            */
            'title' => 'General',
            'desc' => 'All the general settings for application.',
            'icon' => 'la la-rocket',

            /*
                All the input fields needed as form input elements
                Compulsory elements:  type,name,label,rules
                rules must contain "required"
            */
            'elements' => [
                [
                    'type' => 'text', // input fields type
                    'data' => 'string', // data type, string, int, boolean
                    'name' => 'app_name', // unique name for field
                    'label' => 'App Name', // you know what label it is
                    'rules' => 'required|min:2|max:50', // validation rule of laravel
                    'class' => 'w-auto px-2', // any class for input
                    'value' => 'CoolApp' // default value if you want
                ]
            ]
        ],

        
        'email' => [

            'title' => 'Email',
            'desc' => 'Email settings for app',
            'icon' => 'la la-envelope',

            'elements' => [
                [
                    'type' => 'email',
                    'name' => 'support_email',
                    'label' => 'Support email',
                    'rules' => 'required',
                    //...
                ],
                [
                    'type' => 'select',
                    'options' => [1,2,3,],
                    'name' => 'select_di_prova',
                    'label' => 'Select Di Prova',
                    'rules' => 'required',
                    //...
                ],
            ]
        ],


    ];