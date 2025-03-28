<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validatedData = $request->validate(
            [
                'first-name' => 'required',
                'last-name' => 'required',
                'user-name' => 'required',
                'new-email' => 'required',
                'new-password' => 'required',
            ],
            [
                'first-name.required' => 'Please enter a valid name',
                'last-name.required' => 'Please enter a valid name',
                'user-name.required' => 'Please enter a unique name',
                'new-email.required' => 'Please enter a valid email address',
                'new-password.required' => 'Please enter a valid password',
            ]
        );

        $attributes = [
            'first_name' => $validatedData['first-name'],
            'last_name' => $validatedData['last-name'],
            'user_name' => $validatedData['user-name'],
            'email' => $validatedData['new-email'],
            'password' => $validatedData['new-password'],
        ];


        $user = User::create($attributes);

        $user->detail()->create();

        Auth::login($user);

        return redirect()->route('profile');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('profile'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $user = Auth::user();
        // return view('profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'nullable',
            'password' => 'nullable|confirmed',
        ]);

        $validatedInfo = $request->validate([
            'city' => 'nullable',
            'district' => 'nullable',
            'street' => 'nullable',
            'postal_code' => 'nullable',
            'phone' => 'nullable',
            'country_code' => 'nullable',
        ]);

        $user = Auth::user();

        // Prepare Attributes To Update For The User Model
        $userAttributes = [];
        if ($request->filled('user_name')) {
            $userAttributes['user_name'] = $validatedData['user_name'];
        }

        // Update The User Model If There Are Attributes To Change
        if (!empty($userAttributes)) {
            $user->update($userAttributes);
        }

        // Check If There Is A New Password Provided
        if ($request->filled('password')) {
            // Verify The Old Password Before Changing
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors([
                    'old_password' => 'The old password does not match.',
                ]);
            }
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }


        $detailAttributes = [];
        if ($request->filled('city')) {
            $detailAttributes['city'] = $validatedInfo['city'];
        }
        if ($request->filled('district')) {
            $detailAttributes['district'] = $validatedInfo['district'];
        }
        if ($request->filled('street')) {
            $detailAttributes['street'] = $validatedInfo['street'];
        }
        if ($request->filled('postal_code')) {
            $detailAttributes['postal_code'] = $validatedInfo['postal_code'];
        }
        if ($request->filled('phone')) {
            $detailAttributes['phone_number'] = $validatedInfo['phone'];
        }
        if ($request->filled('country_code')) {
            $detailAttributes['country_code'] = $validatedInfo['country_code'];
        }

        // Update The User Details Model If There Are Attributes To Change
        if (!empty($detailAttributes)) {
            $user->detail()->update($detailAttributes);
        }

        // $info = user_details::create($userattr);

        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
