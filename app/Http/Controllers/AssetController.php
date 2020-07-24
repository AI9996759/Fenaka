<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

class AssetController extends Controller
{
    public function index()
    {
        $asset = Asset::orderBy('id', 'ASC')->get();
        return view('inventoryasset.index')
        ->with('asset',$asset)
            ;

    }  
}
