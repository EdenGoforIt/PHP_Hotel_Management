<?php

namespace App\Http\Controllers\Admin;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoomsRequest;
use App\Http\Requests\Admin\UpdateRoomsRequest;
use App\Category;

class RoomsController extends Controller
{
    /**
     * Display a listing of Room.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (request('show_deleted') == 1) {

            $rooms = Room::onlyTrashed()->get();
        } else {
            $rooms = Room::all();
        }

        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating new Room.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $categories = Category::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        return view('admin.rooms.create', compact('categories'));
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param  \App\Http\Requests\StoreRoomsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $room = Room::create($request->all());



        return redirect()->route('admin.rooms.index');
    }


    /**
     * Show the form for editing Room.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $room = Room::findOrFail($id);
        $categories = Category::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.rooms.edit', compact('room', 'categories'));
    }

    /**
     * Update Room in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $room = Room::findOrFail($id);
        $room->update($request->all());



        return redirect()->route('admin.rooms.index');
    }


    /**
     * Display Room.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $bookings = \App\Booking::where('room_id', $id)->get();

        $room = Room::findOrFail($id);

        return view('admin.rooms.show', compact('room', 'bookings'));
    }


    /**
     * Remove Room from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $room = Room::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.rooms.index');
    }

    /**
     * Delete all selected Room at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if ($request->input('ids')) {
            $entries = Room::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Room from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        $room = Room::onlyTrashed()->findOrFail($id);
        $room->restore();

        return redirect()->route('admin.rooms.index');
    }

    /**
     * Permanently delete Room from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {

        $room = Room::onlyTrashed()->findOrFail($id);
        $room->forceDelete();

        return redirect()->route('admin.rooms.index');
    }
}
