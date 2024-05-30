<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Getting Video gallery image
     */
    public function getImg()
    {
        if ($this->image != null) {
            return url('uploads/gallery/videos/' . $this->image);
        } else {
            return url('uploads/no_image.jpg');
        }
    }
}
