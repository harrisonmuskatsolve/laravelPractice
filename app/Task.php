<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // this is  a static function
    // public static function incomplete() {
    //     return static::where('completed', 0)->get();
    // }

    // this is a query-scoped function
    // this will return a query: to execute, run App\Task::incomplete()->get();
    // you can also chain this like so: App\Task::incomplete()->where('id', '>', 1)->get();
    public function scopeIncomplete($query) {
        return $query->where('completed', 0);
    }
}
