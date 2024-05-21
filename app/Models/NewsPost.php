<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Showing News image
     */
    public function getImg()
    {
        if ($this->image != null) {
            return url('uploads/news/' . $this->image);
        } else {
            return url('uploads/no_image.jpg');
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
