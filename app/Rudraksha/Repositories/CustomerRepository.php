<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 2:11 PM
 */

namespace App\Rudraksha\Repositories;

use Illuminate\Support\Facades\Hash;
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

    public function ChangePassword($request, $id)
    {
        try {
            $data  = $this->user->find($id);

            if ( Hash::check($request['oldpassword'],$data->password)) {
                $data->password = bcrypt($request->password);
                $data->save();
                $this->log->error(" Password Changed ", ['id' => $id]);
                return true;
            }
        } catch (QueryException $e) {
            $this->log->error("Password Changing Failed", ['id' => $id], [$e->getMessage()]);

            return false;
        }
    }
}