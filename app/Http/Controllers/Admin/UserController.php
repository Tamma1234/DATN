<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function create(Request $request, User $users)
    {
      $users = User::all();
      return view('admin.user.create',compact('users'));
    }

    public function store(Request $request)
    {
      $user = new User();
      $data = $request->all();
      if ($request->hasFile('images')) {
        $originalFileName = $request->images->getClientOriginalName();
        $fileName = uniqid() . '_' . str_replace(' ', '_', $originalFileName);
        $data['images'] = $request->file('images')->storeAs('users_image', $fileName, 'public');
    }
    $data['password'] = Hash::make($request->password);

  $user->fill($data);
  $user->save();
  return redirect()->route('user.index')->with('msg','Thêm tài khoản thành công');
    }

    public function delete(Request $request)
    {
      $user = User::find($request->id);

      Storage::disk('public')->delete($user->images);
      if (!$user) {
          return redirect()->route('user.index')->with('msg', 'Người dùng không tồn tại');
      } else {
          $user->delete();
          return redirect()->route('user.index')->with('msg', 'Xóa người dùng thành công');
      }

    }

    public function edit(Request $request)
    {
            $user = User::find($request->id);
            if (!$user) {
                return redirect()->route('user.index')->with('msg', 'Người dùng không tồn tại');
            } else {
              $birthday = Carbon::parse($user->birthday)->toDateString();
                return view('admin.user.edit', compact('user','birthday'));
            }
      }

      public function update(Request $request)
      {

              $user = User::where('id', $request->id)->first();
              $data = $request->except('_token');

              if ($request->hasFile('images')) {
                  Storage::disk('public')->delete($user->images);
                  $originalFileName = $request->images->getClientOriginalName();
                  $fileName = uniqid() . '_' . str_replace(' ', '_', $originalFileName);
                  $data['images'] = $request->file('images')->storeAs('user_image', $fileName, 'public');
              }
              $user = User::where('id', $request->id)->update($data);
              return redirect()->route('user.index')->with('msg', 'Cập nhật thông tin thành công');
          }
}
