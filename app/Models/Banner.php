<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function getImg()
    {
        if ($this->image != null) {
            return url('uploads/banner/' . $this->image);
        } else {
            return url('uploads/no_profile_pic.png');
        }
    }
}
