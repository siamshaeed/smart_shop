<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $category;
    public static $directory;
    public static $message;

    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name        = $request->name;
        self::$category->description = $request->description;
        self::$category->image       = imageUpload($request->file('image'), 'category-image/');
        self::$category->status      = $request->status;
        self::$category->save();
    }

    public static function updateCategoryStatus($id)
    {
        self::$category = Category::find($id);
        if (self::$category->status == 1) {
            self::$category->status = 0;
            self::$message = 'Category info unpublished successfully';
        } else {
            self::$category->status = 1;
            self::$message = 'Category info published successfully';
        }
        self::$category->save();
    }
}