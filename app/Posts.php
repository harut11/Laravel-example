<?php

namespace App;

use File;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\PostCategories;
use Illuminate\Http\UploadedFile;

class Posts extends Model
{
    use Sluggable;

    public function owner()
    {
    	return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function setThumbnailAttribute($file)
    {
        if ($file) {
            if (!empty($this->attributes['thumbnail'])) {
                $old_file_path = public_path('uploads') . '/' . $this->attributes['thumbnail'];
                if (File::exists($old_file_path)) {
                    File::delete($old_file_path);
                }
            }
            $filename = str_random() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $this->attributes['thumbnail'] = $filename;
        }
    }

    public function delete()
    {
    	$path = public_path('/uploads' . $this->thumbnail);
    	if (File::exists($path)) {
    		File::delete($path);
    	}
    	parent::delete();
    }

    public function category()
    {
        return $this->belongsTo(PostCategories::class);
    }

      /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() : array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
