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
use Mail;

class UserController extends Controller
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
        return view('users.index', compact('galeri', 'info', 'images', 'youtube'));
    }

    public function tentang() {
        return view('users.tentang');
    }

    /* Lembaga */
    /* LPH */
    public function lph() {
        $countries = Country::all();
        $provinces = Province::orderBy('name')->get();
        $regencies = Regency::orderBy('name')->get();

        return view('users.lph', compact('countries', 'provinces', 'regencies'));
    }

    public function lph_store(Request $request) {
        $formInput = $request->except('ktp_narahubung', 'logo');

        $this->validate($request, [
          'nama_lembaga' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'nama_narahubung' => 'required',
          'cp_narahubung' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'ktp_narahubung' => 'mimes:png,jpg,jpeg|max:1000',
          'logo' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $ktp=$request->ktp_narahubung;
        $logo=$request->logo;
        $location="images/lph/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $formInput['ktp_narahubung'] = $ktpName;
        }
        if ($logo) {
          $logoName=$logo->getClientOriginalName();
          $logo->move($location, $logoName);
          $formInput['logo'] = $logoName;
        }

        $formInput['user_id'] = Auth::user()->id;
        $formInput['instrumen_id'] = 1;

        $id = LPH::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah melakukan registrasi sebagai LPH di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Pendaftaran sebagai LPH Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.lph'));
    }

    public function lph_update($id, Request $request) {
        $lph = LPH::find($id);

        $this->validate($request, [
          'nama_lembaga' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'nama_narahubung' => 'required',
          'cp_narahubung' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'ktp_narahubung' => 'mimes:png,jpg,jpeg|max:1000',
          'logo' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        $lph->nama_lembaga = $request->nama_lembaga;
        $lph->alamat_lengkap = $request->alamat_lengkap;
        $lph->provinsi_id = $request->provinsi_id;
        $lph->kota_kabupaten_id = $request->kota_kabupaten_id;
        $lph->nomor_handphone = $request->nomor_handphone;
        $lph->nama_narahubung = $request->nama_narahubung;
        $lph->cp_narahubung = $request->cp_narahubung;
        $lph->email = $request->email;

        // Photo Upload
        $ktp=$request->ktp_narahubung;
        $logo=$request->logo;
        $location="images/lph/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $lph->ktp_narahubung = $ktpName;
        }
        if ($logo) {
          $logoName=$logo->getClientOriginalName();
          $logo->move($location, $logoName);
          $lph->logo = $logoName;
        }

        $lph->save();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah mengubah data LPH Anda di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Perubahan Data LPH Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.lph'));
    }

    // Halal Center
    public function halal_center() {
        $countries = Country::all();
        $provinces = Province::orderBy('name')->get();
        $regencies = Regency::orderBy('name')->get();

        return view('users.halal_center', compact('countries', 'provinces', 'regencies'));
    }

    public function halal_center_store(Request $request) {
        $formInput = $request->except('ktp_narahubung');

        $this->validate($request, [
          'nama_lembaga' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'nama_narahubung' => 'required',
          'cp_narahubung' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'ktp_narahubung' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $ktp=$request->ktp_narahubung;
        $location="images/halal_center/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $formInput['ktp_narahubung'] = $ktpName;
        }

        $formInput['user_id'] = Auth::user()->id;
        $formInput['instrumen_id'] = 1;

        $id = HalalCenter::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah melakukan registrasi sebagai Halal Center di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Pendaftaran sebagai Halal Center Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.halal_center'));
    }

    public function halal_center_update($id, Request $request) {
        $halal_center = HalalCenter::find($id);

        $this->validate($request, [
          'nama_lembaga' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'nama_narahubung' => 'required',
          'cp_narahubung' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'ktp_narahubung' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        $halal_center->nama_lembaga = $request->nama_lembaga;
        $halal_center->alamat_lengkap = $request->alamat_lengkap;
        $halal_center->provinsi_id = $request->provinsi_id;
        $halal_center->kota_kabupaten_id = $request->kota_kabupaten_id;
        $halal_center->nomor_handphone = $request->nomor_handphone;
        $halal_center->nama_narahubung = $request->nama_narahubung;
        $halal_center->cp_narahubung = $request->cp_narahubung;
        $halal_center->email = $request->email;

        // Photo Upload
        $ktp=$request->ktp_narahubung;
        $location="images/halal_center/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $halal_center->ktp_narahubung = $ktpName;
        }

        $halal_center->save();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah mengubah data Halal Center Anda di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Perubahan Data Halal Center Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.halal_center'));
    }

    /* Perorangan */
    public function auditor_halal() {
        $lph = LPH::all();
        $provinces = Province::orderBy('name')->get();
        $regencies = Regency::orderBy('name')->get();

        return view('users.auditor_halal', compact('lph', 'provinces', 'regencies'));
    }

    public function auditor_halal_store(Request $request) {
        $formInput = $request->except('foto', 'ktp', 'ijazah', 'transkip');

        $this->validate($request, [
          'lph_id' => 'required|integer',
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
          'pendidikan_terakhir' => 'required|max:100',
          'foto' => 'mimes:png,jpg,jpeg|max:1000',
          'ktp' => 'mimes:png,jpg,jpeg|max:1000',
          'ijazah' => 'mimes:png,jpg,jpeg|max:1000',
          'transkip' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $foto=$request->foto;
        $ktp=$request->ktp;
        $ijazah=$request->ijazah;
        $transkip=$request->transkip;
        $location="images/auditor_halal/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
          $fotoName=$foto->getClientOriginalName();
          $foto->move($location, $fotoName);
          $formInput['foto'] = $fotoName;
        }
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $formInput['ktp'] = $ktpName;
        }
        if ($ijazah) {
          $ijazahName=$ijazah->getClientOriginalName();
          $ijazah->move($location, $ijazahName);
          $formInput['ijazah'] = $ijazahName;
        }
        if ($transkip) {
          $transkipName=$transkip->getClientOriginalName();
          $transkip->move($location, $transkipName);
          $formInput['transkip'] = $transkipName;
        }

        $formInput['user_id'] = Auth::user()->id;
        $formInput['instrumen_id'] = 2;

        $id = AuditorHalal::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah melakukan registrasi sebagai Auditor Halal di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Pendaftaran sebagai Auditor Halal Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.auditor_halal'));
    }

    public function auditor_halal_update($id, Request $request) {
        $auditor = AuditorHalal::find($id);

        $this->validate($request, [
          'lph_id' => 'required|integer',
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
          'pendidikan_terakhir' => 'required|max:100',
          'foto' => 'mimes:png,jpg,jpeg|max:1000',
          'ktp' => 'mimes:png,jpg,jpeg|max:1000',
          'ijazah' => 'mimes:png,jpg,jpeg|max:1000',
          'transkip' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        $auditor->lph_id = $request->lph_id;
        $auditor->nama = $request->nama;
        $auditor->alamat_lengkap = $request->alamat_lengkap;
        $auditor->provinsi_id = $request->provinsi_id;
        $auditor->kota_kabupaten_id = $request->kota_kabupaten_id;
        $auditor->provinsi_tl_id = $request->provinsi_tl_id;
        $auditor->kota_kabupaten_tl_id = $request->kota_kabupaten_tl_id;
        $auditor->tanggal_lahir = $request->tanggal_lahir;
        $auditor->nomor_handphone = $request->nomor_handphone;
        $auditor->email = $request->email;
        $auditor->sosmed = $request->sosmed;
        $auditor->pendidikan_terakhir = $request->pendidikan_terakhir;

        // Photo Upload
        $foto=$request->foto;
        $ktp=$request->ktp;
        $ijazah=$request->ijazah;
        $transkip=$request->transkip;
        $location="images/auditor_halal/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
          $fotoName=$foto->getClientOriginalName();
          $foto->move($location, $fotoName);
          $auditor->foto = $fotoName;
        }
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $auditor->ktp = $ktpName;
        }
        if ($ijazah) {
          $ijazahName=$ijazah->getClientOriginalName();
          $ijazah->move($location, $ijazahName);
          $auditor->ijazah = $ijazahName;
        }
        if ($transkip) {
          $transkipName=$transkip->getClientOriginalName();
          $transkip->move($location, $transkipName);
          $auditor->transkip = $transkipName;
        }

        $auditor->save();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah mengubah data Anda di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Perubahan Data Auditor Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.auditor_halal'));
    }

    // Penyelia
    public function penyelia_halal() {
        $halal_center = HalalCenter::all();
        $countries = Country::all();
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('users.penyelia_halal', compact('halal_center', 'countries', 'provinces', 'regencies'));
    }

    public function penyelia_halal_store(Request $request) {
        $formInput = $request->except('foto', 'ktp', 'ijazah', 'transkip');

        $this->validate($request, [
          'halal_center_id' => 'required|integer',
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
          'pendidikan_terakhir' => 'required|max:100',
          'foto' => 'mimes:png,jpg,jpeg|max:1000',
          'ktp' => 'mimes:png,jpg,jpeg|max:1000',
          'ijazah' => 'mimes:png,jpg,jpeg|max:1000',
          'transkip' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $foto=$request->foto;
        $ktp=$request->ktp;
        $ijazah=$request->ijazah;
        $transkip=$request->transkip;
        $location="images/penyelia_halal/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
          $fotoName=$foto->getClientOriginalName();
          $foto->move($location, $fotoName);
          $formInput['foto'] = $fotoName;
        }
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $formInput['ktp'] = $ktpName;
        }
        if ($ijazah) {
          $ijazahName=$ijazah->getClientOriginalName();
          $ijazah->move($location, $ijazahName);
          $formInput['ijazah'] = $ijazahName;
        }
        if ($transkip) {
          $transkipName=$transkip->getClientOriginalName();
          $transkip->move($location, $transkipName);
          $formInput['transkip'] = $transkipName;
        }

        $formInput['user_id'] = Auth::user()->id;
        $formInput['instrumen_id'] = 2;

        $id = PenyeliaHalal::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah melakukan registrasi sebagai Penyelia Halal di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Pendaftaran sebagai Penyelia Halal Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.penyelia_halal'));
    }

    public function penyelia_halal_update($id, Request $request) {
        $penyelia = PenyeliaHalal::find($id);

        $this->validate($request, [
          'halal_center_id' => 'required|integer',
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
          'pendidikan_terakhir' => 'required|max:100',
          'foto' => 'mimes:png,jpg,jpeg|max:1000',
          'ktp' => 'mimes:png,jpg,jpeg|max:1000',
          'ijazah' => 'mimes:png,jpg,jpeg|max:1000',
          'transkip' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        $penyelia->halal_center_id = $request->halal_center_id;
        $penyelia->nama = $request->nama;
        $penyelia->alamat_lengkap = $request->alamat_lengkap;
        $penyelia->provinsi_id = $request->provinsi_id;
        $penyelia->kota_kabupaten_id = $request->kota_kabupaten_id;
        $penyelia->provinsi_tl_id = $request->provinsi_tl_id;
        $penyelia->kota_kabupaten_tl_id = $request->kota_kabupaten_tl_id;
        $penyelia->tanggal_lahir = $request->tanggal_lahir;
        $penyelia->nomor_handphone = $request->nomor_handphone;
        $penyelia->email = $request->email;
        $penyelia->sosmed = $request->sosmed;
        $penyelia->pendidikan_terakhir = $request->pendidikan_terakhir;

        // Photo Upload
        $foto=$request->foto;
        $ktp=$request->ktp;
        $ijazah=$request->ijazah;
        $transkip=$request->transkip;
        $location="images/penyelia_halal/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
          $fotoName=$foto->getClientOriginalName();
          $foto->move($location, $fotoName);
          $penyelia->foto = $fotoName;
        }
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $penyelia->ktp = $ktpName;
        }
        if ($ijazah) {
          $ijazahName=$ijazah->getClientOriginalName();
          $ijazah->move($location, $ijazahName);
          $penyelia->ijazah = $ijazahName;
        }
        if ($transkip) {
          $transkipName=$transkip->getClientOriginalName();
          $transkip->move($location, $transkipName);
          $penyelia->transkip = $transkipName;
        }

        $penyelia->save();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah mengubah data Anda di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Perubahan Data Penyelia Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.penyelia_halal'));
    }

    // Manager Halal
    public function manager_halal() {
        $countries = Country::all();
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('users.manager_halal', compact('countries', 'provinces', 'regencies'));
    }

    public function manager_halal_store(Request $request) {
        $formInput = $request->except('foto', 'ktp', 'ijazah', 'transkip');

        $this->validate($request, [
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
          'pendidikan_terakhir' => 'required|max:100',
          'foto' => 'mimes:png,jpg,jpeg|max:1000',
          'ktp' => 'mimes:png,jpg,jpeg|max:1000',
          'ijazah' => 'mimes:png,jpg,jpeg|max:1000',
          'transkip' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $foto=$request->foto;
        $ktp=$request->ktp;
        $ijazah=$request->ijazah;
        $transkip=$request->transkip;
        $location="images/manager_halal/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
          $fotoName=$foto->getClientOriginalName();
          $foto->move($location, $fotoName);
          $formInput['foto'] = $fotoName;
        }
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $formInput['ktp'] = $ktpName;
        }
        if ($ijazah) {
          $ijazahName=$ijazah->getClientOriginalName();
          $ijazah->move($location, $ijazahName);
          $formInput['ijazah'] = $ijazahName;
        }
        if ($transkip) {
          $transkipName=$transkip->getClientOriginalName();
          $transkip->move($location, $transkipName);
          $formInput['transkip'] = $transkipName;
        }

        $formInput['user_id'] = Auth::user()->id;
        $formInput['instrumen_id'] = 2;

        $id = ManagerHalal::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah melakukan registrasi sebagai Manager Halal di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Pendaftaran sebagai Manager Halal Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.manager_halal'));
    }

    public function manager_halal_update($id, Request $request) {
        $manager = ManagerHalal::find($id);

        $this->validate($request, [
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
          'pendidikan_terakhir' => 'required|max:100',
          'foto' => 'mimes:png,jpg,jpeg|max:1000',
          'ktp' => 'mimes:png,jpg,jpeg|max:1000',
          'ijazah' => 'mimes:png,jpg,jpeg|max:1000',
          'transkip' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        $manager->nama = $request->nama;
        $manager->alamat_lengkap = $request->alamat_lengkap;
        $manager->provinsi_id = $request->provinsi_id;
        $manager->kota_kabupaten_id = $request->kota_kabupaten_id;
        $manager->provinsi_tl_id = $request->provinsi_tl_id;
        $manager->kota_kabupaten_tl_id = $request->kota_kabupaten_tl_id;
        $manager->tanggal_lahir = $request->tanggal_lahir;
        $manager->nomor_handphone = $request->nomor_handphone;
        $manager->email = $request->email;
        $manager->sosmed = $request->sosmed;
        $manager->pendidikan_terakhir = $request->pendidikan_terakhir;

        // Photo Upload
        $foto=$request->foto;
        $ktp=$request->ktp;
        $ijazah=$request->ijazah;
        $transkip=$request->transkip;
        $location="images/manager_halal/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
          $fotoName=$foto->getClientOriginalName();
          $foto->move($location, $fotoName);
          $manager->foto = $fotoName;
        }
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $manager->ktp = $ktpName;
        }
        if ($ijazah) {
          $ijazahName=$ijazah->getClientOriginalName();
          $ijazah->move($location, $ijazahName);
          $manager->ijazah = $ijazahName;
        }
        if ($transkip) {
          $transkipName=$transkip->getClientOriginalName();
          $transkip->move($location, $transkipName);
          $manager->transkip = $transkipName;
        }

        $manager->save();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah mengubah data Anda di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Perubahan Data Manager Halal Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.manager_halal'));
    }

    // Juleha
    public function juleha() {
        $countries = Country::all();
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('users.juleha', compact('countries', 'provinces', 'regencies'));
    }

    public function juleha_store(Request $request) {
        $formInput = $request->except('foto', 'ktp', 'ijazah', 'transkip');

        $this->validate($request, [
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
          'pendidikan_terakhir' => 'required|max:100',
          'foto' => 'mimes:png,jpg,jpeg|max:1000',
          'ktp' => 'mimes:png,jpg,jpeg|max:1000',
          'ijazah' => 'mimes:png,jpg,jpeg|max:1000',
          'transkip' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $foto=$request->foto;
        $ktp=$request->ktp;
        $ijazah=$request->ijazah;
        $transkip=$request->transkip;
        $location="images/juleha/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
          $fotoName=$foto->getClientOriginalName();
          $foto->move($location, $fotoName);
          $formInput['foto'] = $fotoName;
        }
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $formInput['ktp'] = $ktpName;
        }
        if ($ijazah) {
          $ijazahName=$ijazah->getClientOriginalName();
          $ijazah->move($location, $ijazahName);
          $formInput['ijazah'] = $ijazahName;
        }
        if ($transkip) {
          $transkipName=$transkip->getClientOriginalName();
          $transkip->move($location, $transkipName);
          $formInput['transkip'] = $transkipName;
        }

        $formInput['user_id'] = Auth::user()->id;
        $formInput['instrumen_id'] = 2;

        $id = Juleha::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah melakukan registrasi sebagai Juru Sembelih Halal di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Pendaftaran sebagai Juru Sembelih Halal Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.juleha'));
    }

    public function juleha_update($id, Request $request) {
        $juleha = Juleha::find($id);

        $this->validate($request, [
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
          'pendidikan_terakhir' => 'required|max:100',
          'foto' => 'mimes:png,jpg,jpeg|max:1000',
          'ktp' => 'mimes:png,jpg,jpeg|max:1000',
          'ijazah' => 'mimes:png,jpg,jpeg|max:1000',
          'transkip' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        $juleha->nama = $request->nama;
        $juleha->alamat_lengkap = $request->alamat_lengkap;
        $juleha->provinsi_id = $request->provinsi_id;
        $juleha->kota_kabupaten_id = $request->kota_kabupaten_id;
        $juleha->provinsi_tl_id = $request->provinsi_tl_id;
        $juleha->kota_kabupaten_tl_id = $request->kota_kabupaten_tl_id;
        $juleha->tanggal_lahir = $request->tanggal_lahir;
        $juleha->nomor_handphone = $request->nomor_handphone;
        $juleha->email = $request->email;
        $juleha->sosmed = $request->sosmed;
        $juleha->pendidikan_terakhir = $request->pendidikan_terakhir;

        // Photo Upload
        $foto=$request->foto;
        $ktp=$request->ktp;
        $ijazah=$request->ijazah;
        $transkip=$request->transkip;
        $location="images/juleha/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
          $fotoName=$foto->getClientOriginalName();
          $foto->move($location, $fotoName);
          $juleha->foto = $fotoName;
        }
        if ($ktp) {
          $ktpName=$ktp->getClientOriginalName();
          $ktp->move($location, $ktpName);
          $juleha->ktp = $ktpName;
        }
        if ($ijazah) {
          $ijazahName=$ijazah->getClientOriginalName();
          $ijazah->move($location, $ijazahName);
          $juleha->ijazah = $ijazahName;
        }
        if ($transkip) {
          $transkipName=$transkip->getClientOriginalName();
          $transkip->move($location, $transkipName);
          $juleha->transkip = $transkipName;
        }

        $juleha->save();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah mengubah data Anda di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Perubahan Data Juleha Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.juleha'));
    }

    /* Pelaku Usaha */
    public function pelaku_usaha() {
        $provinces = Province::all();
        $regencies = Regency::all();

        return view('users.pelaku_usaha', compact('provinces', 'regencies'));
    }

    public function pelaku_usaha_store(Request $request) {
        $formInput = $request->all();

        $this->validate($request, [
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
        ]);

        $formInput['user_id'] = Auth::user()->id;

        $id = PelakuUsaha::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah melakukan registrasi sebagai Pelaku Usaha di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Pendaftaran sebagai Pelaku Usaha Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.pelaku_usaha'));
    }

    public function pelaku_usaha_update($id, Request $request) {
        $pelaku_usaha = PelakuUsaha::find($id);

        $this->validate($request, [
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'provinsi_tl_id' => 'integer|required',
          'kota_kabupaten_tl_id' => 'integer|required',
          'tanggal_lahir' => 'date|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
          'sosmed' => 'required|max:100',
        ]);

        $pelaku_usaha->nama = $request->nama;
        $pelaku_usaha->alamat_lengkap = $request->alamat_lengkap;
        $pelaku_usaha->provinsi_id = $request->provinsi_id;
        $pelaku_usaha->kota_kabupaten_id = $request->kota_kabupaten_id;
        $pelaku_usaha->provinsi_tl_id = $request->provinsi_tl_id;
        $pelaku_usaha->kota_kabupaten_tl_id = $request->kota_kabupaten_tl_id;
        $pelaku_usaha->tanggal_lahir = $request->tanggal_lahir;
        $pelaku_usaha->nomor_handphone = $request->nomor_handphone;
        $pelaku_usaha->email = $request->email;
        $pelaku_usaha->sosmed = $request->sosmed;

        $pelaku_usaha->save();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah mengubah data Anda di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Perubahan Data Pelaku Usaha Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.pelaku_usaha'));
    }

    public function perusahaan_store(Request $request) {
        $formInput = $request->all();

        $this->validate($request, [
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
        ]);

        $formInput['pelaku_usaha_id'] = Auth::user()->pelaku_usaha->id;

        $id = Perusahaan::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah menambahkan Perusahaan di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Tambah Perusahaan Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.pelaku_usaha'));
    }

    public function perusahaan_update($id, Request $request) {
        $perusahaan = Perusahaan::find($id);

        $this->validate($request, [
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'nomor_handphone' => 'required|numeric|digits_between:3,20',
          'email' => 'email|required|max:50',
        ]);

        $perusahaan->nama = $request->nama;
        $perusahaan->alamat_lengkap = $request->alamat_lengkap;
        $perusahaan->provinsi_id = $request->provinsi_id;
        $perusahaan->kota_kabupaten_id = $request->kota_kabupaten_id;
        $perusahaan->nomor_handphone = $request->nomor_handphone;
        $perusahaan->email = $request->email;

        $perusahaan->save();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah mengubah data Anda di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Perubahan Data Perusahaan Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.pelaku_usaha'));
    }

    public function produk_store(Request $request) {
        $formInput = $request->except('legalitas', 'foto_produk');

        $this->validate($request, [
          'nama' => 'required|max:100',
          'deskripsi' => 'required|max:1000',
          'legalitas' => 'mimes:png,jpg,jpeg|max:1000',
          'foto_produk' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $legalitas=$request->legalitas;
        $fotoproduk=$request->foto_produk;
        $location="images/produk/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($legalitas) {
          $legalitasName=$legalitas->getClientOriginalName();
          $legalitas->move($location, $legalitasName);
          $formInput['legalitas'] = $legalitasName;
        }
        if ($fotoproduk) {
          $fotoName=$fotoproduk->getClientOriginalName();
          $fotoproduk->move($location, $fotoName);
          $formInput['foto_produk'] = $fotoName;
        }

        $formInput['perusahaan_id'] = Auth::user()->pelaku_usaha->perusahaan->id;

        $id = Produk::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah menambahkan Produk di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Tambah Produk Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.pelaku_usaha'));
    }

    public function produk_hapus($id) {
        $produk = Produk::find($id)->delete();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah menghapus salah satu Produk di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Hapus Produk Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.pelaku_usaha'));
    }

    public function restoran_store(Request $request) {
        $formInput = $request->except('foto');

        $this->validate($request, [
          'nama' => 'required|max:100',
          'alamat_lengkap' => 'required|max:200',
          'provinsi_id' => 'integer|required',
          'kota_kabupaten_id' => 'integer|required',
          'foto' => 'mimes:png,jpg,jpeg|max:1000',
        ]);

        // Photo Upload
        $foto=$request->foto;
        $location="images/restoran/" . Auth::user()->id;
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
          $fotoName=$foto->getClientOriginalName();
          $foto->move($location, $fotoName);
          $formInput['foto'] = $fotoName;
        }

        $formInput['perusahaan_id'] = Auth::user()->pelaku_usaha->perusahaan->id;

        $id = Restoran::create($formInput)->id;

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Terima kasih telah menambahkan Restoran di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Tambah Restoran Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.pelaku_usaha'));
    }

    public function restoran_hapus($id) {
        $restoran = Restoran::find($id)->delete();

        // Send Email
        $to_name = Auth::user()->name;
        $to_email = Auth::user()->email;
        $data = array('name' => $to_name, "body" => "Anda telah menghapus salah satu Restoran di Say Halal!");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Hapus Restoran Berhasil!');
            $message->from('info@say-halal.com', 'Say Halal');
        });

        return redirect(route('users.pelaku_usaha'));
    }
}
