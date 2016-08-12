<?php

namespace Infinety\FileManager\Models;

use Illuminate\Database\Eloquent\Model;


class Files extends Model
{

    protected $fillable = [
         'name'
    ];


    public function group()
    {
        return $this->belongsToMany('\Sentinel\Models\Group','files_groups');
    }

}
