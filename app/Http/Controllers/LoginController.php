<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use DB;
use App\Http\Controllers\HelplerController as Helper;


class LoginController extends Controller
{
    //UserLogin
    public function login($logged, $type, $data){
        /*
            logged: đăng nhập == 1, chưa đăng nhập  == 0
            type: quản trị viên == 0, người dùng == 1
            data: 
                'UserID' => $user->getId(),
                'Nickname' => $user->getNickname(),
                'Name' => $user->getName(),
                'Email' => $user->getEmail(),
                'Avatar' => $user->getAvatar()
        */
        $loginData = [
            'logged' => $logged,
            'type' => $type,
            'data' => $data,
        ];
        session(['loginData'=> $loginData, 'msg' => 'Đăng nhập thành công', 'code' => 1]);
    }
    public function logout(){
        $loginData = [
            'logged' => 0,
            'type' => 0,
            'data' => null,
        ];
        session(['loginData'=> $loginData, 'msg' => 'Đăng xuất thành công', 'code' => 1]);
        return redirect(route('user.index'));
    }
    public function redirect(){
        dd("hmm");
        return Socialite::driver('facebook')->redirect();
    }
    public function callback(){
        // Init
        $user = Socialite::driver('facebook')->user();
        // Facebook data return to array
        $userData = [
            'UserID' => $user->getId(),
            'Nickname' => $user->getNickname(),
            'Name' => $user->getName(),
            'Email' => $user->getEmail(),
            'Avatar' => $user->getAvatar()
        ];
        /*
            Check already have infomation in db
            Yes: Login then return home page
            No: create
        */
        if ($this->checkUser($user->getId())){
            $this->login(1, 1,$userData);
            return redirect(route('user.index'));
        } else {
            $result = DB::table('user')->insert($userData);
            if($result){
                $this->login($userData);
                return redirect(route('user.index'));
            } else {
                return redirect(route('user.login'));
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
