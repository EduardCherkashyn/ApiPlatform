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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateUser extends AbstractController
{
    public function __invoke(User $data, PasswordEncoder $encoder)
    {
        $encoder->index($data);

        return $data;
    }
}
