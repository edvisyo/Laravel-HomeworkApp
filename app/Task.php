<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Statuse;

class Task extends Model
{
    //Table Name
    protected $table = 'tasks';
    //Primary Key
    public $primaryKey = 'id';

    public function status() {
        return $this->belongsTo(Statuse::class);
    }

}
