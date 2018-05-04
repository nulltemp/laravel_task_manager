<?php

namespace App\Http\Controllers;

use App\Panel;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $panels = Panel::all();
      return $panels;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $panel = new Panel;
      $panel->name = request('name');
      $panel->save();

      $panels = Panel::all();
      return $panels;
    }

    public function destroy($id) {
      $panel = Panel::find($id);
      $panel->delete();

      $panels = Panel::all();
      return $panels;
    }
}
