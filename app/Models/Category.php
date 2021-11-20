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
    public static $image;
    public static $imagURL;

    public static function getImageURL($request, $category = null)
    {
        if (self::$image = $request->file('image')) {
            if ($category) {
                if (file_exists($category->image)) {
                    if ($category->image != 'dummy.png') {
                        unlink($category->image);
                    }
                }
            }
            self::$imagURL = imageUpload(self::$image, 'category-image/');
        } else {
            if ($category) {
                self::$imagURL = self::$category->image;
            } else {
                self::$imagURL = 'dummy.png';
            }
        }
        return self::$imagURL;
    }

    public static function newCategory($request)
    {
        self::saveBasicInfo(new Category(), $request, self::getImageURL($request));
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

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        self::saveBasicInfo(self::$category, $request, self::getImageURL($request, self::$category));
    }

    public static function saveBasicInfo($category, $request, $imagURL)
    {
        $category->name        = $request->name;
        $category->description = $request->description;
        $category->image       = $imagURL;
        $category->status      = $request->status;
        $category->save();
    }
}