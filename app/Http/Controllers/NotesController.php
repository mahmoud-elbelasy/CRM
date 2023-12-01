<?php

namespace App\Http\Controllers;

use App\Crm\Customer\Models\note;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class NotesController extends Controller
{
    public function index($customerId)
    {
        return note::where('customer_id',$customerId)->get();
    }

    public function show($customerId,$id)
    {
        $note = note::find($id);
        if(!$note){
            return response()->json(['status'=>'not found'], ResponseAlias::HTTP_NOT_FOUND);
        }

        if($note->customer_id !== $customerId){
            return response()->json(['status'=>'invalid data'], ResponseAlias::HTTP_BAD_REQUEST);
        }
        return $note;

    }

    public function create(Request $request,$customerId)
    {
        $validate = $request->validate([
            'note' => ['required','string']
        ]);
        $note = note::create([
            'note' => $request->note,
            'customer_id' => $customerId
        ]);

        return $note;
    }

    public function update(Request $request,$customerId,$id)
    {
        $note = note::find($id);

        if(!$note){
            return response()->json(['status'=>'not found'], ResponseAlias::HTTP_NOT_FOUND);
        }

        if($note->customer_id != $customerId){
            return response()->json(['status'=>'invalid data'], ResponseAlias::HTTP_BAD_REQUEST);
        }
//        return "here";
        $note->update([
            'note' => $request->note,
            'customer_id' => $customerId
        ]);

        return $note;
    }

    public function delete(Request $request,$customerId,$id)
    {
        $note = note::find($id);
        if(!$note){
            return response()->json(['status'=>'not found'], ResponseAlias::HTTP_NOT_FOUND);
        }
        if($note->customer_id != $customerId){
            return response()->json(['status'=>'invalid data'], ResponseAlias::HTTP_BAD_REQUEST);
        }

        $note->delete();

        return response()->json(['status'=>'deleted'], ResponseAlias::HTTP_OK);
    }
}
