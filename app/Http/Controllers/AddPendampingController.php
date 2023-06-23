<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AddPendampingController extends Controller
{
    //
    public function addpedampings(Request $request)
    {

        $agenda_id = Agenda::find($request->agenda_id);

        $pendamping = new AddPendamping;
        $pendamping->user_id = $request->input('pendamping_id');
        $pendamping->agenda_id  = $agenda_id;
        // $pendamping->save();

        if ($pendamping->save()) {
            return  response()->json(['data'=>$pendamping], 200);
        }else{
            return response()->json(['data'=>'Error'], 200);
        }




    }
}
