<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Category extends Model
{
    //
    public function contents()
    {
        return $this->hasMany(Content::class, 'category_id');
    }
}
