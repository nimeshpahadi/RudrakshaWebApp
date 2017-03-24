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
use Illuminate\Database\QueryException;
use File;

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

    /**
     * get user by id
     * @param $id
     * @return mixed
     */
    public function getCustomerId($id)
    {
        return $this->user->select('*')->where('id', $id)->first();
    }

    public function upload_image($Formdata, $id)
    {
        try {
            $data = User::find($id);
            $name = $data->image;
            $path = storage_path() . '/app/public/users/';
            File::delete($path . $name);
            $data->image = $Formdata['image'];
            $data->update();
            $this->log->info("User Image added");
            return true;

        } catch (QueryException $e) {

            $this->log->error("User Image Creation Failed : ", [$e->getMessage()]);
            return false;
        }

    }
}