<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Regency;
use App\Province;
use Auth;
use File;
use App\LPH;
use App\HalalCenter;
use App\AuditorHalal;
use App\PenyeliaHalal;
use App\ManagerHalal;
use App\Juleha;
use App\PelakuUsaha;
use App\Perusahaan;
use App\Produk;
use App\Restoran;
use App\Galeri;
use App\Info;
use Vinkla\Instagram\Instagram;
use Youtube;

class AdminController extends Controller
{
    public function index() {
        if (Galeri::count() <= 0) {
            $galeri = null;
        } else {
            $galeri = Galeri::orderBy('id', 'desc')->first();
        }

        $instagram = new Instagram('13354265549.1677ed0.c849aaad104c43579e7cf9248abfe2af');

        // $images = collect($instagram->media(['count' => 4]))->map(function ($each) {
        //     return $each->images->standard_resolution->url;
        // });

        $images = $instagram->media(['count' => 4]);

        // $videos1 = collect(Youtube::listChannelVideos('UCtPMupSim72rQFIlrapL6wQ', 2))->map(function ($each) {
        //     return Youtube::getVideoInfo($each->id->videoId);
        // });

        // $videos = $videos1 = collect($videos1)->map(function ($each) {
        //     return $each->player->embedHtml;
        // });

        $youtube = \App\Youtube::orderBy('id', 'desc')->first();

        $info = Info::orderBy('id', 'desc')->get();

        // return view('users.index', compact('galeri', 'info', 'images', 'videos'));
        return view('admins.index', compact('galeri', 'info', 'images', 'youtube'));
    }

    public function tentang() {
        return view('admins.tentang');
    }

    public function galeri() {
        return view('admins.galeri');
    }

    public function galeri_post(Request $request) {
        $formInput = $request->except('galeri1', 'galeri2', 'galeri3', 'galeri4');

        $this->validate($request, [
          'galeri1' => 'mimes:png,jpg,jpeg|max:1000',
          'galeri2' => 'mimes:png,jpg,jpeg|max:1000',
          'galeri3' => 'mimes:png,jpg,jpeg|max:1000',
          'galeri4' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $galeri1=$request->galeri1;
        $galeri2=$request->galeri2;
        $galeri3=$request->galeri3;
        $galeri4=$request->galeri4;
        $location="images/galeri/";
        File::makeDirectory($location, 0777, true, true);
        if ($galeri1) {
          $galeri1Name=$galeri1->getClientOriginalName();
          $galeri1->move($location, $galeri1Name);
          $formInput['galeri1'] = $galeri1Name;
        }
        if ($galeri2) {
          $galeri2Name=$galeri2->getClientOriginalName();
          $galeri2->move($location, $galeri2Name);
          $formInput['galeri2'] = $galeri2Name;
        }
        if ($galeri3) {
          $galeri3Name=$galeri3->getClientOriginalName();
          $galeri3->move($location, $galeri3Name);
          $formInput['galeri3'] = $galeri3Name;
        }
        if ($galeri4) {
          $galeri4Name=$galeri4->getClientOriginalName();
          $galeri4->move($location, $galeri4Name);
          $formInput['galeri4'] = $galeri4Name;
        }

        $id = Galeri::create($formInput)->id;

        return redirect(route('admins.index'));
    }

    public function youtube() {
        return view('admins.youtube');
    }

    public function youtube_post(Request $request) {
        $formInput = $request->all();

        $id = \App\Youtube::create($formInput)->id;

        return redirect(route('admins.index'));
    }

    public function info() {
        $info = Info::all();

        return view('admins.info', compact('info'));
    }

    public function info_post(Request $request) {
        $formInput = $request->except('lampiran');

        $this->validate($request, [
          'judul' => 'required',
          'info' => 'required',
          'lampiran' => 'mimes:pdf',
        ]);

        $lampiran=$request->lampiran;
        $location="info/lampiran/";
        File::makeDirectory($location, 0777, true, true);
        if ($lampiran) {
          $lampiranName=$lampiran->getClientOriginalName();
          $lampiran->move($location, $lampiranName);
          $formInput['lampiran'] = $lampiranName;
        }

        $formInput['user_id'] = Auth::user()->id;

        $id = Info::create($formInput)->id;

        return redirect(route('admins.info'));
    }

    public function info_hapus($id) {
        $in = Info::where('id', $id)->first();
        $in->delete();

        return redirect(route('admins.info'));
    }

    public function lph() {
        $lph = LPH::all();

        return view('admins.lph', compact('lph'));
    }

    public function halal_center() {
        $halal_center = HalalCenter::all();

        return view('admins.halal_center', compact('halal_center'));
    }

    public function auditor_halal() {
        $auditor_halal = AuditorHalal::all();

        return view('admins.auditor_halal', compact('auditor_halal'));
    }

    public function penyelia_halal() {
        $penyelia_halal = PenyeliaHalal::all();

        return view('admins.penyelia_halal', compact('penyelia_halal'));
    }

    public function manager_halal() {
        $manager_halal = ManagerHalal::all();

        return view('admins.manager_halal', compact('manager_halal'));
    }

    public function juleha() {
        $juleha = Juleha::all();

        return view('admins.juleha', compact('juleha'));
    }

    public function pelaku_usaha() {
        $pelaku_usaha = PelakuUsaha::all();

        return view('admins.pelaku_usaha', compact('pelaku_usaha'));
    }
}
