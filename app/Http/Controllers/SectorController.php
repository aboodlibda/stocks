<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSectorSeederJob;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $lastSectorDate = Sector::query()->orderBy('updated_at', 'desc')->first()->updated_at;
        return view('cms.sector.index',compact('lastSectorDate'));
    }

    public function uploadSectorData(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv|max:10240', // limit 10MB
        ]);

        $file = $request->file('file');
        $filename = 'sectors.csv';
        $file->move(public_path('uploads/excel'), $filename);
        // run the queue worker
        ProcessSectorSeederJob::dispatch();
        return response()->json(['success' => true, 'filename' => $filename, 'message' => 'File uploaded successfully, now executing SectorsTableSeeder...']);

    }

}
