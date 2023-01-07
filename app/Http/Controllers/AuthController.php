<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Shankl\Services\AuthService;
use Shankl\Services\FileService;
use Shankl\Entities\ParentEntity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Shankl\Factories\EntitiesFactory;
use GrahamCampbell\ResultType\Success;
use App\Providers\RouteServiceProvider;
use Shankl\Adapters\FileServiceAdapter;
use App\Http\Requests\ParentRegisterReq;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Shankl\Repositories\ParentRepository;

class AuthController extends Controller
{

    private AuthService  $authService;

    private FileServiceAdapter $fileser;
    public function __construct(AuthService $authService, FileServiceAdapter $fileser)
    {
        $this->authService = $authService;

        $this->fileser = $fileser;
    }


    public function Parentregister(ParentRegisterReq $request, ParentRepository $parentRepo)
    {

        $request->validated();


        $parentObj =  EntitiesFactory::createEntity($request->except('image'), 'parent');


        $hashPassword = Hash::make($request->password);

        $parentObj->setPassword($hashPassword);

        $parentObj->changeStatus();

        if ($request->hasFile('image')) {


            $this->fileser->setFile($request->file('image'));

            $this->fileser->setPath("parents");

            $filePath =  $this->fileser->upload();

            $parentObj->setImage($filePath);
        }

        $authParent = $this->authService->RegisterUser($parentRepo, $parentObj);

        Auth::guard('parent')->login($authParent);

        $request->session()->regenerate();



        return redirect()->route('add-child', $authParent->id);
    }

    public function parentLogin(Request $request)
    {

        $this->authService->LoginUser('parent', $request);

        $request->session()->regenerate();

        return redirect()->route(RouteServiceProvider::PARENT);
    }


    public function parentLogout($guard)
    {
        $this->authService->logoutUser($guard);
        return redirect()->route('home');
    }


    public function forgotPassword()
    {
        return view('web.Auth.forgot-parent-password');
    }

    public function forgotPasswordPostRequest(Request $request, $broker)
    {
        
        $request->validate(['email' => 'required|email']);
        dd(Password::RESET_LINK_SENT);
        $status = Password::broker($broker)->sendResetLink(
            $request->only('email')
        );

        

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }


    public function resetPassword($token)
    {
        return view('web.Auth.reset-parent-password')->with([
            'token' => $token
        ]);
    }

    public function resetPasswordPostRequest(Request $request, $broker)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::broker($broker)->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
