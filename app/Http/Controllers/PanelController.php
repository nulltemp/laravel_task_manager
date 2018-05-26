<?php

namespace App\Http\Controllers;

use App\Panel;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
      $panels = Panel::all();
      return $panels;
    }

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
