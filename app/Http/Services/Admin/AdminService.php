<?php
namespace App\Http\Services\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Redirect;

class AdminService
{
    public function login($request)
    {
        try {
            $admin_email = $request->admin_email;
            $admin_password = md5($request->admin_password);

            $result = DB::table('admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
            if ($result) {
                session::put('admin_name', $result->admin_name);
                session::put('admin_id', $result->admin_id);
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng');
            }
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            // Ghi log (ghi lỗi)
            \Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function logout($request)
    {
        session::put('admin_name', null);
        session::put('admin_id', null);
    }
}