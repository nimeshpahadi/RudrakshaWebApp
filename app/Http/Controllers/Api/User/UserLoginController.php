<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/31/17
 * Time: 11:22 AM
 */

namespace App\Http\Controllers\Api\User;


use App\Rudraksha\Services\Api\User\UserLoginService;
use Illuminate\Http\Request;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Parser as JwtParser;
use League\OAuth2\Server\AuthorizationServer;
use Psr\Http\Message\ServerRequestInterface;

class UserLoginController extends AccessTokenController
{
    /**
     * @var UserLoginService
     */
    private $loginService;

    /**
     * UserLoginController constructor.
     * @param AuthorizationServer $server
     * @param TokenRepository $tokens
     * @param JwtParser $jwt
     * @param UserLoginService $loginService
     */
    public function __construct(AuthorizationServer $server,
                                TokenRepository $tokens,
                                JwtParser $jwt, UserLoginService $loginService)
    {
        parent::__construct($server, $tokens, $jwt);
        $this->loginService = $loginService;
    }

    /**
     * Overriding AccessTokenController method
     * @param ServerRequestInterface $request
     * @return array|\Laravel\Passport\Http\Controllers\Response
     */
    public function issueToken(ServerRequestInterface $request)
    {
        $user = $request->getParsedBody();

        if ($user['grant_type']=="password") {

            $status = $this->loginService->userDetailsByEmail($user['username']);

            if ($status == true) {
                return parent::issueToken($request); // TODO: Change the autogenerated stub
            }

            else {

                $respo = [
                    "status" => "false",
                    "message" => "you need to confirm your account. we have sent you an activation code, please check your email."
                ];

                return $respo;
            }
        }

        // if grant_type is refresh_token
        if ($user['grant_type'] == "refresh_token") {
            return parent::issueToken($request); // TODO: Change the autogenerated stub
        }
    }


    /**
     * Returning user id
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     */
    public function userId(Request $request)
    {
        $data = $request->all();

        $user = $this->loginService->userDetailsByEmail($data);

        if ($user==false) {
            $response = [
                "status" => "false",
                "message" => "email not confirmed"
            ];

            return $response;
        }

        return response()->json($user->id);
    }

    /**
     * Returning user details on the basis of user id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function userDetails($id)
    {
        $user = $this->loginService->serviceUserDetails($id);

        return response()->json($user);
    }
}