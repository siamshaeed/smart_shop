<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public static $brand;
    public static $directory;
    public static $message;
    public static $image;
    public static $imagURL;

    public static function getImageURL($request, $brand = null)
    {
        if (self::$image = $request->file('image')) {
            if ($brand) {
                if (file_exists($brand->image)) {
                    if ($brand->image != 'dummy.png') {
                        unlink($brand->image);
                    }
                }
            }
            self::$imagURL = imageUpload(self::$image, 'brand-image/');
        } else {
            if ($brand) {
                self::$imagURL = self::$brand->image;
            } else {
                self::$imagURL = 'dummy.png';
            }
        }
        return self::$imagURL;
    }

    public static function newBrand($request)
    {
        self::saveBasicInfo(new Brand(), $request, self::getImageURL($request));
    }

    public static function updateBrandStatus($id)
    {
        self::$brand = Brand::find($id);
        if (self::$brand->status == 1) {
            self::$brand->status = 0;
            self::$message = 'Brand info unpublished successfully';
        } else {
            self::$brand->status = 1;
            self::$message = 'Brand info published successfully';
        }
        self::$brand->save();
    }

    public static function updateBrand($request, $id)
    {
        self::$brand = Brand::find($id);
        self::saveBasicInfo(self::$brand, $request, self::getImageURL($request, self::$brand));
    }

    public static function saveBasicInfo($brand, $request, $imagURL)
    {
        $brand->name        = $request->name;
        $brand->description = $request->description;
        $brand->image       = $imagURL;
        $brand->status      = $request->status;
        $brand->save();
    }
}
