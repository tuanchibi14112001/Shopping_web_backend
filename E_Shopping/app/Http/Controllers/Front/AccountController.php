<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Service\User\UserServiceInterface;
use App\Service\Order\OrderServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    private $userService;
    private $orderService;


    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService)
    {
        $this->userService = $userService;
        $this->orderService = $orderService;
    }

    public function login()
    {
        return view('front.account.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_client, // muc do binh thuong
        ];

        $remember = $request->remember ?? false;

        if (Auth::attempt($credentials, $remember))
            return redirect('');
        else
            return back()->with('notification', "ERROR: Email or password wrong.");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        return view('front.account.register');
    }

    public function postResgister(Request $request)
    {
        if ($request->password != $request->password_cofirmation) {
            return back()->with('notification', 'ERROR: Confirm password does not match');
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'level' => Constant::user_level_client,
        ];

        $this->userService->create($data);
        return redirect('account/login')->with('notification', 'Registration successful, please login');
    }

    public function myOrderIndex()
    {
        $orders = $this->orderService->getOrderByUserId(Auth::user()->id);
        return view('front.account.my-order.index', [
            'orders' => $orders
        ]);
    }

    public function myOrderDetail($order_id){
        $order = $this->orderService->find($order_id);
        return view('front.account.my-order.show', [
            'order' => $order
        ]);
    }
}
