<?php
namespace App\Http\Controllers;
use App\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller {

  function index() {
    $dashboard = Dashboard::all();
    $colors = Dashboard::getAllColors();
    return view('dashboard.index', compact('dashboard', 'colors'));
  }

  function edit($id=0) {
    $config = Dashboard::find($id);
    if(!$config) {
      return redirect()->route('dashboard')->with('error','Wrong Configuration!');
    }
    $colors = Dashboard::getAllColors();
    return view('dashboard.edit', compact('config', 'colors'));
  }

  function update(Request $request, $id=0) {
    $config = Dashboard::find($id);
    if(!$config) {
      return redirect()->route('dashboard')->with('error','Wrong Configuration!');
    }

    if(!$config->validate($request->post())) {
      $errors = implode('<br />', $config->errors->all());
      return back()->with('error', $errors);
    } else {
      $config->title = $request->title;
      $config->link = $request->link ?? '';
      $config->color = $request->color;
      if($config->save()){
        return redirect()->route('dashboard')->with('success', 'Configuration edited successfully!');
      } else {
        return back()->with('error', 'Some problem appeared during editing, please try again later!');
      }
    }
  }


  function delete($id=0){
    $config = Dashboard::find($id);
    if(!$config) {
      return redirect()->route('dashboard')->with('error','Wrong Configuration!');
    }
    if($config->reset()) {
      return redirect()->route('dashboard')->with('success', 'Configuration reset successfully!');
    } else {
      return redirect()->route('dashboard')->with('error', 'Some problem appeared during resetting, please try again later!');
    }

  }

}