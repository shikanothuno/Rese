<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoreRepresentativeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CreateStoreRepresentativeController extends Controller
{
    public function store(CreateStoreRepresentativeRequest $request)
    {
        $user = Auth::user();
        $name = $request->input("name");
        $email = $request->input("email");
        $password = $request->input("password");
        $shop_id = $request->input("shop_id");

        if(!is_null($user))
        {
            User::createStoreRepresentative($name, $email, $password, $shop_id);
        }

        return redirect(route("admin.admin"));
    }
}
