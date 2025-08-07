<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $merchants = Merchant::all(); // Or your specific logic
        return view('admin.dashboard', compact('merchants'));
    }
}
