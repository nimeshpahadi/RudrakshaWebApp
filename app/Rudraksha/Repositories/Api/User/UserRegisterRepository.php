<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/15/17
 * Time: 12:18 PM
 */

namespace App\Rudraksha\Repositories\Api\User;


use App\User;
use File;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;

class UserRegisterRepository
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var Log
     */
    private $log;

    /**
     * UserRegisterRepository constructor.
     * @param User $user
     * @param Log $log
     */
    public function __construct(User $user, Log $log)
    {
        $this->user = $user;
        $this->log = $log;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createUserRepository($data)
    {
        $userData = $this->user->create($data)->toArray();
        $userData['token'] = str_random(25);

        $user = User::find($userData['id']);
        $user->token = $userData['token'];
        $user->save();

        Mail::send('mails.confirmation', $userData, function ($message) use ($userData) {
            $message->to($userData['email']);
            $message->subject('Registration Confirmation');
        });

        return true;
    }

    /**
     * @param $imageData
     * @param $id
     * @return bool
     */
    public function repoUserImageUpdate($imageData, $id)
    {
        try {
            $data = User::find($id);
            $name = $data->image;
            $path = storage_path() . '/app/public/users/';
            File::delete($path . $name);
            $data->image = $imageData['image'];
            $data->update();
            $this->log->info("User Image added");
            return true;

        } catch (QueryException $e) {

            $this->log->error("User Image Creation Failed : ", [$e->getMessage()]);
            return false;
        }
    }

    /**
     * @param $request
     * @param $id
     * @return bool
     */
    public function repoUserInfoUpdate($request, $id)
    {
        try {
            $data = User::find($id);
            $data->firstname = $request['firstname'];
            $data->lastname = $request['lastname'];
            $data->email = $request['email'];
            $data->contact = $request['contact'];
            $data->alternative_contact = $request['alternative_contact'];
            $data->update();
            $this->log->info("User Info updated");
            return true;

        } catch (QueryException $e) {

            $this->log->error("User info update Failed : ", [$e->getMessage()]);
            return false;
        }
    }

    public function getUsersRepo()
    {
        return $this->user->all();
    }
}