<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TitlesController extends Controller
{
    public function index()
    {
        return view('cms.titles.index');
    }

    public function edit()
    {
        return view('cms.titles.edit');
    }


    public function update(Request $request)
    {
        $path_en = lang_path('en/trans.php');
        $path_ar = lang_path('ar/trans.php');

        // Get the current translations
        $translations_en = include($path_en);
        $translations_ar = include($path_ar);

        // Update the key
        foreach ($request->except(['_method','_token']) as $key => $value) {

            $key = str_replace("_", " ", $key);

            $translations_en[$key] = $value['en'];
            $translations_ar[$key] = $value['ar'];
        }

        // Convert array back to PHP file format
        $content_en = "<?php\n\nreturn " . var_export($translations_en, true) . ";\n";
        $content_ar = "<?php\n\nreturn " . var_export($translations_ar, true) . ";\n";

        // Save file
        File::put($path_en, $content_en);
        File::put($path_ar, $content_ar);

//        return redirect()->route('titles.index')->with('success', 'تم تحديث العناوين بنجاح');
        return redirect()->route('titles.index')->with('toast', [
            'key' => 'success',
            'message' => 'تم تحديث العناوين بنجاح'
        ]);

    }

}
