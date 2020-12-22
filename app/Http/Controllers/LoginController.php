<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use DB;
use App\Http\Controllers\HelplerController as Helper;


class LoginController extends Controller
{
    //UserLogin
    public function login($userData){
        session(['userData'=> $userData, 'msg' => "Đăng nhập thành công"]);
    }
    public function logout(){
        session()->forget('userData');
        session(['msg' => "Đã đăng xuất"]);
    }

    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }
    /*

        userData = ID NAME


    */
    public function callback(){
        $user = Socialite::driver('facebook')->user();
        var_dump($user);
        $userData = [
            'UserID' => $user->getId(),
            'Nickname' => $user->getNickname(),
            'Name' => $user->getName(),
            'Email' => $user->getEmail(),
            'Avatar' => $user->getAvatar()
        ];
        if ($this->checkUser($user->getId())){
            $this->login($userData);
            return redirect(route('admin.dashboard'));
        } else {
            $result = DB::table('user')->insert($userData);
            if($result){
                $this->login($userData);
                return redirect(route('admin.dashboard'));
            } else {
                return redirect(route('admin.login'));
            }
        }
    }
    public function checkUser($id){
        $user = DB::table('user')->where('UserID', $id)->first();
        if($user){
            return true;
        } else {
            return false;
        }
    }
    //Admin login

    public function adminLoginIndex(){
        return view('admin.login');
    }
    public function authAdmin(Request $request){
        $result = DB::table('admin')->where('Username', $request->Username)->where('Password', $request->Password)->get();
        if(isset($result[0])){
            $role = $result[0]->Role;
            $roleName = null;
            if ($role){
                $roleName = "Nhân viên";
            } else {
                $roleName = "Quản trị viên";
            }
            $userData = [
                'Name' => $result[0]->Name,
                'Role' => $role,
                'RoleName' => $roleName,
            ];
            $this->adminLogin($userData);
            return redirect(route('admin.dashboard'));
        } else {
            session(['msg' => "Đăng nhập thấ bại"]);
            return redirect(route('admin.dashboard'));
        }
    }
    public function adminLogin($userData){
        session(['logged' => 1, 'userData'=> $userData, 'msg' => "Đăng nhập thành công"]);
    }
    public function adminLogout(){
        session()->forget('userData');
        session()->forget('logged');
        session(['msg' => "Đã đăng xuất"]);
        return $this->redirect(route('admin.login'));
    }
}
