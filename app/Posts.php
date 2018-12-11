<?php

namespace App;
use File;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public function owner()
    {
    	return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function delete()
    {
    	$path = public_path('/uploads' . $this->thumbnail);
    	if (File::exists($path)) {
    		File::delete($path);
    	}
    	parent::delete();
    }
}
