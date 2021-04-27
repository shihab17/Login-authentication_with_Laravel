<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $notices = Notice::all();
        $notices = DB::select('SELECT * from notices ORDER BY created_at DESC');
        return view('notices.index')->with('notices', $notices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user() == null) {
            return view('msg.error');
        } else {
            if (Auth::user()->role->id == 1) {
                return view('notices.create');
            } else {
                $message = 'Create';
                return view('msg.userError')->with('message',$message);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required'
        ]);

        $notice = new Notice;
        $notice->title = $request->input('title');
        $notice->desc = $request->input('desc');
        $notice->save();

        return redirect('/notice')->with('success', 'Notice posted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::find($id);
        if (Auth::user() == null) {
            $role_id = '';
            return view('notices.show')
                ->with('notice', $notice)
                ->with('role_id', $role_id);
        }
        else{
            if (Auth::user()->role->id == 1){
                $role_id = 'admin';
                return view('notices.show')
                    ->with('notice', $notice)
                    ->with('role_id', $role_id);
            }
            else{
                $role_id = 'user';
                return view('notices.show')
                    ->with('notice', $notice)
                    ->with('role_id', $role_id);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::find($id);
        if (Auth::user() == null) {
            return view('msg.error');
        } else {
            if (Auth::user()->role->id == 1) {
                return view('notices.edit')
                    ->with('notice', $notice);
            } else {
                $message = 'Edit';
                return view('msg.userError')->with('message',$message);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required'
        ]);

        $notice = Notice::find($id);
        $notice->title = $request->input('title');
        $notice->desc = $request->input('desc');
        $notice->save();

        return redirect('/notice')->with('success', 'Notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        return redirect('/notice')->with('success', 'Notice deleted successfully.');
    }
}
