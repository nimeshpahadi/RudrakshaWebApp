<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 2:11 PM
 */

namespace App\Rudraksha\Repositories;


use App\User;
use Illuminate\Contracts\Logging\Log;

class CustomerRepository
{

    /**
     * @var User
     */
    private $user;
    /**
     * @var Log
     */
    private $log;

    public function __construct(User $user, Log $log)
    {
        $this->user = $user;
        $this->log = $log;
    }

    public function getAllCustomer()
    {
        return $this->user->select('*')->get();
    }

    public function getCustomerId($id)
    {
        return $this->user->select('*')->where('id',$id)->first();
    }
}