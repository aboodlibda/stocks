<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSectorSeederJob;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::query()->paginate(20);
        return view('cms.sector.index',compact('sectors'));
    }

    public function uploadPage()
    {
        $lastSectorDate = Sector::query()->orderBy('updated_at', 'desc')->first()->updated_at;
        return view('cms.sector.upload',compact('lastSectorDate'));
    }

    public function uploadSectorData(Request $request)
    {

        $request->validate([
            'file' => 'required|max:10240',
        ]);

        $file = $request->file('file');
        $filename = 'sectors.csv';
        $file->move(public_path('uploads/excel'), $filename);
        $path = public_path('uploads/excel/sectors.csv');

        // Use built-in PHP for CSV
        $rows = array_map('str_getcsv', file($path));

        // Check header values
        $header = $rows[0];
        if ($header[0] !== 'date;open;high;low;close;volume;turnover;code;name') {
            return response()->json([
                'success' => false,
                'message' => [
                    "The header row does not match the expected format: date|open|high|low|close|volume|turnover|code|name"
                ]
            ], 422);
        }

//        // run the queue worker
        ProcessSectorSeederJob::dispatch();
        return response()->json(['success' => true, 'filename' => $filename, 'message' => 'تم رفع الملف بنجاح , وجاري إدخال البيانات لقاعدة البيانات']);

    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $sectors = Sector::when($query, function($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
                ->orWhere('code', 'like', "%{$query}%");
        })
            ->latest()
            ->paginate(10);

        if ($request->ajax()) {
            return view('cms.sector.partials.table', compact('sectors'))->render();
        }

        return view('cms.sector.index', compact('sectors'));
    }

}
