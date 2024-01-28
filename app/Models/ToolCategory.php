<?php 
// app\Models\ToolCategory.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolCategory extends Model
{
    use HasFactory;

    protected $table = 'tool_categories';

    protected $fillable = [
        'name',
        'meta_title',
        'meta_description',
        'display_title',
        'display_description',
        'home_page_visibility',
        'route',
        'tool_icon',
    ];

    
}

?>