<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Dashboard extends Model {
  const COLOR_NONE = 0;
  const COLOR_RED = 1;
  const COLOR_PURPLE = 2;
  const COLOR_BLUE = 3;
  const COLOR_GREEN = 4;
  const COLOR_ORANGE = 5;

  protected $table = 'dashboard';

  private $rules = [
    'title' => 'required|max:255|unique:dashboard',
    'link' => 'max:255',
    'color' => 'required|in:'.self::COLOR_NONE.','.self::COLOR_RED.','.self::COLOR_PURPLE.','.self::COLOR_BLUE.','.self::COLOR_GREEN.','.self::COLOR_ORANGE,
  ];

  public $errors = [];

  /**
   * @return array
   */
  public static function getAllColors() : array {
    return [
      self::COLOR_NONE => 'none',
      self::COLOR_RED => 'red',
      self::COLOR_PURPLE => 'purple',
      self::COLOR_BLUE => 'blue',
      self::COLOR_GREEN => 'green',
      self::COLOR_ORANGE => 'orange'
    ];
  }

  /**
   * @param $data
   * @return bool
   */
  public function validate($data) : bool {
    $rules = $this->rules;
    $rules['title'] = $rules['title']. ',id,' . $this->id;
    $v = Validator::make($data, $rules);
    if ($v->fails()) {
      $this->errors = $v->errors();
      return false;
    }
    return true;
  }


  /**
   * Resets button configuration
   * @return bool
   */
  public function reset() : bool {
    $this->title = $this->id;
    $this->link = '';
    $this->color = self::COLOR_NONE;
    return $this->save();
  }

  /**
   * @param Request $data
   * @return bool
   */
  public function patchSave(Request $data) :  bool {
    $this->title = $data->title;
    $this->link = $data->link ?? '';
    $this->color = $data->color;
    return $this->save();
  }

  /**
   * @return string
   */
  public function errorMsg() : string {
    return  implode('<br />', $this->errors->all());
  }

}