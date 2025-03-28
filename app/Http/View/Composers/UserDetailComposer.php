<?php

namespace App\Http\View\Composers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserDetailComposer
{
    public function compose(View $view)
    {
        $user = Auth::user();

        if ($user) {

            // $user->load('detail');
            $view->with('info', ['email' => $user->email, 'user_name' => $user->user_name, 'first_name' => $user->first_name, 'last_name' => $user->last_name]);
            $view->with('userDetail', $user->detail);
        } else {
            $view->with('info', null);
            $view->with('userDetail', null);
        }
        // dd($view);
    }
}
