<?php

namespace App\Http\Controllers;

use App\Models\ShortURL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShortURLController extends Controller
{
    public function index(){
        return view('index', [
            'link' => ShortURL::firstWhere('target', request('target'))]);
    }

    public function shorten(Request $request){
        $request->validate([
            'target' => ['required'],
        ]);

        $url = ShortURL::where('target', $request->target)->first();
        
        if (! $url) {
            $url = ShortURL::create([
                'target' => $request->target,
                'short' => $this->generateURL(),
            ]);
        }
        return view('index', ['url' => $url]);
    }

    public function redirect(ShortURL $link){
        return redirect()->to("//$link->target");
    }

    public function redirectOldWay(string $short)
    {
        $url = ShortURL::where('short', $short)->firstOrFail();
        return redirect()->to($url->target);
    }

    public function generateURL(){
        // random
        $result = base_convert(rand(1000,99999),10, 36);
        // query to check if exists
        $data = ShortURL::whereshort($result)->first();

        // loop until found
        if ($data != null){
            $this->generateURL();
        }
        return $result;

        // $result = null;

        // do {
        //     $result = base_convert(rand(1000,99999),10, 36);
        // } while (ShortURL::whereshort($result)->exists());

        // return $result;
    }
}
