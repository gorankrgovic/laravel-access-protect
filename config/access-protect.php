<?php
/*
 * This file is part of Laravel Access Protect.
 *
 * (c) Goran Krgovic <gorankrgovic1@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


return [
    /*
     * Define the passwords.
     *
     * You can add passwords, comma separated if you want to allow multiple passwords
     */
    'passwords' => env('ACCESS_PROTECT_PASSWORDS'),

    /*
     *
     * By default we do nto want to give the 4xx response header code.
     *
     * This is useful if you are for example behind Elastic Beanstalk which monitors the instance health by checking 4xx.
     * In this case leave it to 200.
     *
     * If you explicitly want to change the code to, let's say 403 - be my guest
     *
     */
    'response_code' => 200
];