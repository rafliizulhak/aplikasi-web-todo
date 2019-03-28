<?php
  namespace App;

  use Illuminate\Database\Eloquent\Model;

  /**
   *
   */
  class todo extends Model
  {
    public $table = 't_todolist';

    protected $fillable = [
      'id','kegiatan', 'deskripsi'];
  }

 ?>
