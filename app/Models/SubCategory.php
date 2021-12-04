<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public static $subCategory;
    public static $directory;
    public static $message;
    public static $image;
    public static $imagURL;

    // image
    public static function getImageURL($request, $subCategory = null)
    {
        if (self::$image = $request->file('image')) {
            if ($subCategory) {
                if (file_exists($subCategory->image)) {
                    if ($subCategory->image != 'dummy.png') {
                        unlink($subCategory->image);
                    }
                }
            }
            self::$imagURL = imageUpload(self::$image, 'sub-category-image/');
        } else {
            if ($subCategory) {
                self::$imagURL = self::$subCategory->image;
            } else {
                self::$imagURL = 'dummy.png';
            }
        }
        return self::$imagURL;
    }

    public static function newSubCategory($request)
    {
        self::saveBasicInfo(new SubCategory(), $request, self::getImageURL($request));
    }

    public static function updateSubCategoryStatus($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (self::$subCategory->status == 1) {
            self::$subCategory->status = 0;
            self::$message = 'Sub Category info unpublished successfully';
        } else {
            self::$subCategory->status = 1;
            self::$message = 'Sub Category info published successfully';
        }
        self::$subCategory->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subCategory = SubCategory::find($id);
        self::saveBasicInfo(self::$subCategory, $request, self::getImageURL($request, self::$subCategory));
    }

    // method for data save
    public static function saveBasicInfo($subCategory, $request, $imagURL)
    {
        $subCategory->category_id = $request->category_id;
        $subCategory->name        = $request->name;
        $subCategory->description = $request->description;
        $subCategory->image       = $imagURL;
        $subCategory->status      = $request->status;
        $subCategory->save();
    }

    // relation for category name
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
