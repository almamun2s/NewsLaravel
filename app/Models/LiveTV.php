<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveTV extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Getting Banner Image
     */
    public function getImg()
    {
        if ($this->image != null) {
            return url('uploads/banner/' . $this->image);
        } else {
            return url('uploads/no_image.jpg');
        }
    }
}
