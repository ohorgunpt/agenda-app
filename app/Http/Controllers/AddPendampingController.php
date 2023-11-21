<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit;
use App\Models\AddPedamping;
use Auth;


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


        $userUnit = User::where('id','=',$request->pendamping_id)->first();
        $id_Unit = $userUnit->unit_id;
        $pendamping = AddPedamping::create(
            [
                'user_id' => $request->pendamping_id,
                'agenda_id'=>$request->agenda_id,
                'unit_id'=>$id_Unit,

            ]
        );
        return redirect()->back();
    }
    public function destroy($id)
    {
        $pendamping = AddPedamping::find($id);
        $pendamping->delete();
        return redirect()->back();
    }
}
