<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\User\UserService;
use App\DTO\Auth\RegisterRequestDTO;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RegisteredUserController extends Controller
{
    /**
     * @param UserService $userService
     */
    public function __construct(private UserService $userService)
    {
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * @param RegisterRequest $request
     * @return RedirectResponse
     * @throws UnknownProperties
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = $this->userService->store(new RegisterRequestDTO($request->validated()));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
