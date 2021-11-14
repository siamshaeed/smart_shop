<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $category;
    public static $directory;

    public static function imageUpload($image)
    {
        self::$directory = 'category-image/';
        $name      = $image->getClientOriginalName();
        $image->move(self::$directory, $name);
        return self::$directory . $name;
    }

    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name        = $request->name;
        self::$category->description = $request->description;
        self::$category->image       = self::imageUpload($request->file('image'));
        self::$category->status      = $request->status;
        self::$category->save();
    }
}
