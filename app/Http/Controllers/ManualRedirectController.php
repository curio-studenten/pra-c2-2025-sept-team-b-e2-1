<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manual;

class ManualRedirectController extends Controller
{
    public function redirect(string $name)
    {
        $manual = Manual::where('name', $name)->firstOrFail();
        $manual->increment('visit_counter');
        
        return redirect()->away($manual->url);
    }
}
