<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Showing News image
     */
    public function getImg()
    {
        if ($this->image != null) {
            return url('uploads/gallery/photos/' . $this->image);
        } else {
            return url('uploads/no_image.jpg');
        }
    }
}
