<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role !== 'admin') {
                abort(403, 'Access denied');
            }
            return $next($request);
        });
    }
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
    'email' => ['required', 'string', 'email', 'max:255'],
    'password' => ['nullable'],
    'role' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        // $user->update($data)0;
        $user->update($data);
        // dd($request->all());
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
