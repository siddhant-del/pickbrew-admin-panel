<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;

class MerchantController extends Controller
{
    public function index()
    {
        $merchants = Merchant::all();
        return view('merchant.index', compact('merchants'));
    }
}
