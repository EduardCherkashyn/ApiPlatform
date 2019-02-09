<?php
/**
 * Created by PhpStorm.
 * User: eduardcherkashyn
 * Date: 2019-02-06
 * Time: 18:43
 */

namespace App\Controller;

use App\Entity\User;
use App\Services\PasswordEncoder;

class CreateUser
{
    public function __invoke(User $data, PasswordEncoder $encoder)
    {
        $encoder->index($data);

        return $data;
    }
}
