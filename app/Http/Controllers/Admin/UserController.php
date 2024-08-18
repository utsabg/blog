<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 'admin') {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::create($request->all());

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        if (Auth::user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['string', 'min:8'],
            'role' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user->update($request->all());

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        if (Auth::user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $user->delete();

        return back();
    }

    public function show(User $user)
    {
        if (Auth::user()->role !== 'admin') {
            abort(Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('admin.users.show', compact('user'));
    }
}
