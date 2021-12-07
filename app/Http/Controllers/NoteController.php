<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::orderBy('id', 'desc')->paginate(4);
        return view('frontend.notes.index', compact('notes'));
    }

    public function store(Request $request)
    {
        $note = Note::create($request->all());
        return response()->json([
            'data' => $note,
            'message' => 'thêm mới note thành công'
        ]);
    }

    public function show($id)
    {
        $note = Note::find($id);
        return response()->json(['data' => $note, 'name' => 'Duc'], 200);
    }

    public function edit($id)
    {
        $note = Note::find($id);
        return response()->json(['data' => $note, 'name' => 'Duc'], 200);
    }

    public function update(Request $request, $id)
    {
        Note::find($id)->update($request->all());
        return response()->json(['data' => $request->all(), 'noteid' => $id, 'message' => 'Cập nhật thông tin note thành công'], 200);
    }

    public function destroy($id)
    {
        Note::find($id)->delete();
        return response()->json(['data' => 'removed'], 200);
    }

    public function search(Request $request)
    {
        $output = '';
        $notes = Note::where('name','LIKE','%'.$request->keyword.'%')->get();
        foreach ($notes as $item){
            $output = '<tr>
                        <td>$item->id</td>
                        <td>$item->name</td>
                        <td>$item->description</td>
                        <td>$item->category</td>
                        </tr>';
        }
        return response()->json($output);
    }
}
