<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/15/17
 * Time: 12:18 PM
 */

namespace App\Rudraksha\Repositories\Api\User;


use App\User;

class UserRegisterRepository
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserRegisterRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function createUserRepository($data)
    {
        return $this->user->create($data);
    }

    public function getUsersRepo()
    {
        return $this->user->all();
    }
}