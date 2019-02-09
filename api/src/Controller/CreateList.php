<?php
/**
 * Created by PhpStorm.
 * User: eduardcherkashyn
 * Date: 2019-02-06
 * Time: 18:11
 */

namespace App\Controller;

use App\Entity\CheckList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateList extends AbstractController
{
    public function __invoke(CheckList $data)
    {
        $user = $this->getUser();
        $data->setUser($user);

        return $data;
    }
}
