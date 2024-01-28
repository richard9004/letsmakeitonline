<?php 
// app\Models\ToolCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolSubCategory extends Model
{
    use HasFactory;

    protected $table = 'tool_subcategories';

    protected $fillable = [
        
        'meta_title',
        'meta_description',
        'display_title',
        'display_description',
        'home_page_visibility',
        'route',
        'tool_category_id'
    ];

     // Define the relationship to ToolCategory
     public function toolCategory()
     {
         return $this->belongsTo(ToolCategory::class, 'tool_category_id');
     }

     
}

?>