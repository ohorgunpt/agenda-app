<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddPedamping;

class AddPendampingController extends Controller
{
    //
    // public function addpedampings(Request $request)
    // {

    //     $agenda_id = Agenda::find($request->agenda_id);

    //     $pendamping = new AddPedamping;
    //     $pendamping->user_id = 1;
    //     $pendamping->agenda_id  = 1;
    //     // $pendamping->save();

    //     if ($pendamping->save()) {
    //         return  response()->json(['data'=>$pendamping], 200);
    //     }else{
    //         return response()->json(['data'=>'Error'], 200);
    //     }




    // }

    public function store(Request $request)
    {

        // $agenda_id = Agenda::find($id);
        $pendamping = AddPedamping::create(
            [
                'user_id' => $request->pendamping_id,
                
                'agenda_id'=>$request->agenda_id,
            ]
        );
        return redirect()->back();
    }
}
