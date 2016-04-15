<?php 

namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User Mailer
 *
 */
class UserMailer extends Mailer
{

    public function active($user)
    {
        $this
            ->to($user->email)
            ->subject('Register information form Career System - Viet Nam')
            ->template('active')
            ->viewVars([
                'username' => $user->name,
                'link' => $user->activeLink
            ]);
    }

    public function resetPassword($user)
    {
        $this
            ->to($user->email)
            ->subject('Reset password')
            ->set(['token' => $user->token]);
    }
}