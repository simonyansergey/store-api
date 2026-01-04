<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Actions\RegisterUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function store(
        RegisterRequest $request,
        RegisterUserAction $registerUserAction
    ): Response {
        $data = $request->validated();
        $user = $registerUserAction($data);

        return response()->json(
            data: [
                'user' => $user
            ],
            status: Response::HTTP_CREATED
        );
    }
}
