<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Category;
use App\Models\Content;
use App\Models\Monday;
use App\Models\Tuesday;
use App\Models\Wednesday;
use App\Models\Thursday;
use App\Models\Friday;
use App\Models\Saturday;
use App\Models\Sunday;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MenupageController extends Controller
{

    public function index()
    {
        $pages = Page::where('owner', Auth::user()->id)->get();
        return view('menupage.index')->with('pages', $pages);
    }
    public function getpageid($pagename){
        try{
            $page = new Page;
            $page->name = $pagename;
            $page->owner = Auth::user()->id;
            $page->save();
            $id = $page->id;
            return response()->json(['success'=>$id]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }
    public function createpage($pagename, $id){
        $pages = Page::where('id', $id)->get();
        $categories = Category::where('page_id', $id)->orderBy('sequence')->get();
        $firstids = DB::table('categories')->where('page_id', $id)->orderBy('id')->get('id')->count() ? DB::table('categories')->where('page_id', $id)->orderBy('sequence')->get('id') : '';
        
        $firstid = $firstids ? $firstids[0]->id : '';
        
        return view('pages.lunch.index')->with('pagename', $pagename)->with('page_id', $id)->with('categories', $categories)->with('firstid', $firstid)->with('pages', $pages);
    }

    public function pageremove($id){
        try{
            Page::where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function categorycreate(Request $request){
        try{
            $category = new Category;
            $category->name = $request->name ? $request->name : '';
            $category->page_id = $request->page_id;
            $category->sequence = $request->sequence ? $request->sequence : '';
            $category->save();
            $id = $category->id;
            return response()->json(['success'=>$id]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function categoryupdate(Request $request){
        try{
            $id = $request->id;
            Category::where('id', $id)->update([
                'name' => $request->name ? $request->name : '',
                'sequence' => $request->sequence ? $request->sequence : ''
            ]);
            return response()->json(['success'=>true]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function categoryremove(Request $request){
        try{
            $id = $request->id;
            Category::where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function contentcreate(Request $request){
        try{
            $content = new Content;
            $content->category_id = $request->category_id;
            $content->title = $request->title ? $request->title : '';
            $content->description = $request->description ? $request->description : '';
            $content->number = $request->number ? $request->number : '';
            $content->size = $request->size ? $request->size : '';
            $content->sequence = $request->sequence ? $request->sequence : '';
            $content->save();
            
            $id = $content->id;
            return response()->json(['success'=>$id]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function contentupdate(Request $request){
        try{
            $id = $request->id;
            Content::where('id', $id)->update([
                'title' => $request->title ? $request->title : '',
                'description' => $request->description ? $request->description : '',
                'number' => $request->number ? $request->number : '',
                'size' => $request->size ? $request->size : '',
                'sequence' => $request->sequence ? $request->sequence : ''
            ]);
            return response()->json(['success'=>true]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function contentremove(Request $request){
        try{
            $id = $request->id;
            Content::where('id', $id)->delete();
            return response()->json(['success'=>true]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function pageview($pagename, $id){
        $pages = Page::where('id', $id)->get();
        $categories = Category::where('page_id', $id)->orderBy('sequence')->get();
        $firstids = DB::table('categories')->where('page_id', $id)->orderBy('id')->get('id')->count() ? DB::table('categories')->where('page_id', $id)->orderBy('sequence')->get('id') : '';
        
        $firstid = $firstids ? $firstids[0]->id : '';
        return view('mainpages.'.$pagename.'.index')->with('categories', $categories)->with('firstid', $firstid)->with('pages', $pages);
    }
    
    public function pagenamesave(Request $request){        
        try{
            $id = $request->id;
            Page::where('id', $id)->update([
                'pagename' => $request->menu_name
            ]);
            return response()->json(['success'=>true]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function footersave(Request $request){        
        try{
            $id = $request->id;
            Page::where('id', $id)->update([
                'footer_text' => $request->footer_text
            ]);
            return response()->json(['success'=>true]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }

    public function categet(Request $request){
        try{
            $getTime = time();
            $getWeek = strtolower(date('D', $getTime));
            $hour = date("H");
            $min = date("i");
            $seconds = $hour * 3600 + $min * 60;
            
            if($getWeek == 'mon'){
                $modalName = 'Monday';
                $weekPossble = Monday::where('start_second', '<=', $seconds)->where('end_second', '>=', $seconds)->get();
            }
            else if($getWeek == 'tue'){
                $modalName = 'Tuesday';
                $weekPossble = Tuesday::where('start_second', '<=', $seconds)->where('end_second', '=>', $seconds)->get();
            }
            else if($getWeek == 'wed'){
                $modalName = 'Wednesday';
                $weekPossble = Wednesday::where('start_second', '<=', $seconds)->where('end_second', '=>', $seconds)->get();
            }
            else if($getWeek == 'thu'){
                $modalName = 'Thursday';
                $weekPossble = Thursday::where('start_second', '<=', $seconds)->where('end_second', '=>', $seconds)->get();
            }
            else if($getWeek == 'fri'){
                $modalName = 'Friday';
                $weekPossble = Friday::where('start_second', '<=', $seconds)->where('end_second', '=>', $seconds)->get();
            }
            else if($getWeek == 'sat'){
                $modalName = 'Saturday';
                $weekPossble = Saturday::where('start_second', '<=', $seconds)->where('end_second', '=>', $seconds)->get();
            }
            else if($getWeek == 'sun'){
                $modalName = 'Sunday';
                $weekPossble = Sunday::where('start_second', '<=', $seconds)->where('end_second', '=>', $seconds)->get();
            }
            
            $cate_id = $request->id;
            
            $contents = Content::where('category_id', $cate_id)->where($getWeek, '1')->orderBy('sequence')->get();
            return response()->json(['success'=>true, 'contents'=>$contents]);
        }
        catch(Exception $e){
            return response()->json(['success'=>false]);
        }
    }
    
}