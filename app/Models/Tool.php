<?php 
// app\Models\ToolCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    protected $table = 'tools';

    protected $fillable = [
      
        'meta_title',
        'meta_description',
        'display_title',
        'display_description',
        'home_page_visibility',
        'route',
        'html_content',
        'css',
        'script',
        'tool_category_id',
        'tool_subcategory_id',
        'preview_image',


    ];


      // Define the relationship to ToolCategory
      public function toolCategory()
      {
          return $this->belongsTo(ToolCategory::class, 'tool_category_id');
      }

      // Define the relationship to ToolCategory
      public function toolSubCategory()
      {
          return $this->belongsTo(ToolSubCategory::class, 'tool_subcategory_id');
      }
}

?>