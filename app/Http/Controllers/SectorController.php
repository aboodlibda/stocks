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
        $lastSectorDate = Sector::query()->orderBy('updated_at', 'desc')->value('updated_at');
        $lastSectorDate = $lastSectorDate ? $lastSectorDate : null;
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

        foreach ($rows as $row) {
            // Remove BOM
            $line = preg_replace('/^\x{FEFF}/u', '', $row[0]);

            // Convert to array by delimiter
            $columns = str_getcsv($line, ';');

            // Access by index or map
            $data = [
                'date' => $columns[0],
                'open' => $columns[1],
                'high' => $columns[2],
                'low' => $columns[3],
                'close' => $columns[4],
                'volume' => $columns[5],
                'turnover' => $columns[6],
                'code' => $columns[7],
                'name' => $columns[8], // Arabic name should appear here
            ];
        }
        if (!$data['date'] && !$data['open'] && !$data['high'] && !$data['low'] && !$data['close'] && !$data['volume'] && !$data['turnover'] && !$data['code'] && !$data['name']) {
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
