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


  function edit($id = 0) {
    $config = $this->checkConfig($id);
    $colors = Dashboard::getAllColors();
    return view('dashboard.edit', compact('config', 'colors'));
  }


  function update(Request $request, $id = 0) {
    $config = $this->checkConfig($id);
    if(!$config->validate($request->post())) {
      return back()->with('error', $config->errorMsg());
    }
    if($config->patchSave($request)){
      return redirect()->route('dashboard')->with('success', 'Configuration edited successfully!');
    }
    return back()->with('error', 'Some problem appeared during editing, please try again later!');
  }


  function delete($id = 0) {
    $config = $this->checkConfig($id);
    if($config->reset()) {
      return redirect()->route('dashboard')->with('success', 'Configuration reset successfully!');
    }
    return redirect()->route('dashboard')->with('error', 'Some problem appeared during resetting, please try again later!');
  }

  /**
   * check if config is correct
   * @param int $id
   * @return \Illuminate\Http\RedirectResponse
   */
  private function checkConfig($id = 0) {
    $config = Dashboard::find($id);
    if(!$config) {
      return redirect()->route('dashboard')->with('error','Wrong Configuration!');
    }
    return $config;
  }

}