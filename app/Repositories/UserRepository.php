<?php
namespace App\Repositories;
use App\Models\User;

use Illuminate\Http\Request;


class UserRepository extends  BaseRepository
{

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function create(Request $request)
    {
        $data = $request->only('name','email','password');
        $user = User::query()->create($data);
        return $user;
    }

    public function edit(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $data = $request->only('name','email');
        return User::where('id','=',$id)->update($data);
    }
}
