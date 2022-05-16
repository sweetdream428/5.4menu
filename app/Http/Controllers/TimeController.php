<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Monday;
use App\Models\Tuesday;
use App\Models\Wednesday;
use App\Models\Thursday;
use App\Models\Friday;
use App\Models\Saturday;
use App\Models\Sunday;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{

    public function index($id)
    {
        $contents = Content::where('id', $id)->get();
        $mondays = Monday::where('content_id', $id)->get();
        $tuesdays = Tuesday::where('content_id', $id)->get();
        $wednesdays = Wednesday::where('content_id', $id)->get();
        $thursdays = Thursday::where('content_id', $id)->get();
        $fridays = Friday::where('content_id', $id)->get();
        $saturdays = Saturday::where('content_id', $id)->get();
        $sundays = Sunday::where('content_id', $id)->get();
        $createId = $id;
        return view('time.index')->with('contents', $contents)->with('mondays', $mondays)->with('tuesdays', $tuesdays)->with('tuesdays', $tuesdays)->with('wednesdays', $wednesdays)->with('thursdays', $thursdays)->with('fridays', $fridays)->with('saturdays', $saturdays)->with('sundays', $sundays)->with('createId', $createId);
    }

    public function timeStatus(Request $request){
        try{
            Content::where('id', $request->id)->update([
                $request->week => $request->status,
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>$e]);
        }
    }
    
    public function timeCreate(Request $request){
        try{
            DB::table($request->weekname)->insert([
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'date_check' => $request->date_check,
                'selectdata' => $request->selectdata,
                'content_id' => $request->service_id
            ]);
            $id = DB::getPdo()->lastInsertId();
            return response()->json(['success'=>$id]);
        }catch (Exception $e) {
            return response()->json(['success'=>$e]);
        }
    }
    Public function TimeRemove(Request $request){
        try{
            DB::table($request->weekname)->where('id', $request->real_id)->delete();
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }

    public function timeUpdate(Request $request){
        
        try{
            DB::table($request->weekname)->where('id', $request->real_id)->update([
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'date_check' => $request->date_check,
                'selectdata' => $request->selectdata,
                'content_id' => $request->service_id
            ]);
            return response()->json(['success'=>true]);
        }catch (Exception $e) {
            return response()->json(['success'=>false]);
        }
    }
    
    
}