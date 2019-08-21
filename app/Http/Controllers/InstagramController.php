<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;

class InstagramController extends Controller
{
    public function feed() {
        $instagram = new Instagram(config('services.instagram.access-token'));

        $images = collect($instagram->get())->map(function ($each) {
            return $each->images->standard_resolution->url;
        });

        return view('gallery', compact('images'));
    }
}
