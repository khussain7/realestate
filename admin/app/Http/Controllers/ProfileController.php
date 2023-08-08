<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //dd($request->birthday); exit();
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'image' => ['required','image', 'mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);
        
       
        // $fileName = time() . '.' . $request->image->extension();
        // $request->image->storeAs('public/build/assets/images', $fileName);

        $fileName = $request->id . '_' .time() . '.' . $request->image->extension();
        $request->image->move(public_path('files'), $fileName);
        
       
        $userinfo = auth()->user()->find($request->id);  //Users::find($request->id);
        
        $request->user()->fill($request->validated());
        $userinfo->image = $fileName;
        $userinfo->birthday = $request->birthday;
        $userinfo->user_job_title = $request->user_job_title;
        $userinfo->contact_number = $request->contact_number;
      
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $userinfo->update();
       
       // echo $fileName; echo"<br /> new image"; exit();
        
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
