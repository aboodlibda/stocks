<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        $note = Note::query()->first();
        return view('cms.note.index',compact('note'));
    }

    public function edit(Note $note)
    {
        return view('cms.note.edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoteRequest  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
//        dd($request);
        $note->update($request->validated());

        return redirect()->route('notes.index')->with('toast', [
            'key' => 'success',
            'message' => 'تم تحديث الملاحظات بنجاح'
        ]);

    }

    public function getTooltipContent(Request $request)
    {
        $key = $request->input('key');
        $note = Note::first();

//        dd($key);
        if ($note && isset($note->{$key})) {
            return response()->json($note->{$key});
        }

        return response()->json(['en' => 'Content not found.', 'ar' => 'المحتوى غير موجود.'], 404);
    }



    public function updateLangKey()
    {
        $path = lang_path('en/trans.php');

        // Get the current translations
        $translations = include($path);

//        dd($translations['close']);
        // Update the key
        $translations['close'] = 'uhhuhuhihi';

//        // Convert array back to PHP file format
        $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";

        // Save file
        File::put($path, $content);

//        return "Updated successfully!";
    }

}
