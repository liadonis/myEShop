<?php

namespace App;

use Laravel\Socialite\Contracts\User as VendorUser;

class SocialiteUserService
{
    public function checkUser(VendorUser $vendor_user)
    {
        $account = SocialiteUser::whereVendor("facebook")->whereVendorUserId($vendor_user->getId())->first();

        if($account)
        {
            return $account->user;
        }
        else
        {
            $account = new SocialiteUser([
                "vendor" => "facebook",
                "vendor_user_id" => $vendor_user->getId(),
            ]);

            $user = User::whereEmail($vendor_user->getEmail())->first();

            if(!$user)
            {
                $user = User::create([
                    "email" => $vendor_user->getEmail(),
                    "name" => $vendor_user->getName(),
                ]);
            }
                    //這裡是呼叫SocialiteUser的user方法
            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }

    
}
