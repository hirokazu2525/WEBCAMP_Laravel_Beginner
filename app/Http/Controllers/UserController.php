<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRegisterPost;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * 会員登録ページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('user/register');
    }
    
    /**
     * 会員の新規登録
     */
    public function register(UserRegisterPost $request)
    {
        // validate済みのデータの取得
        //$datum['password'] = Hash::make($datum['password']);
        //
        //$user = Auth::user();
        //$id = Auth::id();
        //var_dump($datum, $user, $id); exit;
        // データの取得
        $datum = $request->validated();

        // user_id の追加
        //$datum['user_id'] = Auth::id();

        // テーブルへのINSERT
        /**DB::table('users')->insert([
            'name' => $datum['name'],
            'email' => $datum['email'],
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make($datum['password'])
        ]);**/
        
        // ★UserModel経由でデータ登録
        $datum['password'] = Hash::make($datum['password']);
        $r = UserModel::create($datum);

        // 会員登録成功
        $request->session()->flash('front.user_register_success', true);

        //
        return redirect('');
    }
}