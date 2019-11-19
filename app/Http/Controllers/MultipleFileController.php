<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\File;
use Carbon\Carbon;

class MultipleFileController extends Controller
{

    /**
     * Show form for upload multiple files.
     * 
     * @return View
     */
    public function form(): View
    {
        return view('multiple.form');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'files.*' => 'required|max:3000' //satuan kilobit  3000Kb=3Mb
        ]);

        $files = [];

        // tampung berkas yang sudah diunggah ke variabel baru
        // 'file' merupakan nama input yang ada pada form
        // simpan berkas yang diunggah ke sub-direktori 'public/files'
        // direktori 'files' otomatis akan dibuat jika belum ada
        foreach ($request->file('files') as $file) {
            if ($file->isValid()) {
                $path = $file->store('public/files');

                // save information to variable
                // next will be saved to database
                $files[] = [
                    'title' => $file->getClientOriginalName(),
                    'filename' => $path,
                    'created_at' => $now = Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => $now,
                ];
            }
        }

        File::insert($files);

        return redirect()
            ->back()
            ->withSuccess(sprintf('Total %s berkas berhasil diunggah.', count($files)));
    }
}
