<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Dashboard extends Model {
  const COLOR_NONE = 0;
  const COLOR_RED = 1;
  const COLOR_YELLOW = 2;
  const COLOR_BLUE = 3;
  const COLOR_GREEN = 4;
  const COLOR_ORANGE = 5;

  protected $table = 'dashboard';

  private $rules = [
    'title' => 'required|max:255',
    'link' => 'max:255',
    'color' => 'required|in:'.self::COLOR_NONE.','.self::COLOR_RED.','.self::COLOR_YELLOW.','.self::COLOR_BLUE.','.self::COLOR_GREEN.','.self::COLOR_ORANGE,
  ];

  public $errors = [];

  /**
   * @return array
   */
  public static function getAllColors() {
    return [
      self::COLOR_NONE => 'none',
      self::COLOR_RED => 'red',
      self::COLOR_YELLOW => 'yellow',
      self::COLOR_BLUE => 'blue',
      self::COLOR_GREEN => 'green',
      self::COLOR_ORANGE => 'orange'
    ];
  }

  /**
   * @param $data
   * @return bool
   */
  public function validate($data) {
    $v = Validator::make($data, $this->rules);
    if ($v->fails()) {
      $this->errors = $v->errors();
      return false;
    }
    return true;
  }


  public function reset() {
    $this->title = $this->id;
    $this->link = '';
    $this->color = self::COLOR_NONE;
    return $this->save();
  }

}