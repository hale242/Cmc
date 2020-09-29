<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{

    public static function ChkRegisterUser($input, $token)
    {

        $email = User::where('email', $input['email'])->first();

        if ($email != null) {
            $value = trans('register.register_email_duplicate');
            return $value;
        }

        // return dd($email);

        if ($email == null) {

            //add data register
            $result = new User;
            $result->first_name = $input['first_name'];
            $result->last_name = $input['last_name'];
            $result->email = $input['email'];
            $result->password = md5($input['password']) . $token;
            $result->company = $input['company'];
            $result->user_status = 1;
            $result->user_type = 2;
            $result->user_from = 'register';
            $result->user_event = $input['event'];

            $result->save();

            if ($result) {

                $value = 'success';

            } else {

                $value = 'error';

            }

        } else {

            $value = 'error';

        }

        return $value;

    }

}
