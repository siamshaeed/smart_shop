<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public static $size;
    public static $message;

    public static function newSize($request)
    {
        self::saveBasicInfo(new Size(), $request);
    }

    public static function updateSizeStatus($id)
    {
        self::$size = Size::find($id);
        if (self::$size->status == 1) {
            self::$size->status = 0;
            self::$message = 'Size info unpublished successfully';
        } else {
            self::$size->status = 1;
            self::$message = 'Size info published successfully';
        }
        self::$size->save();
        return self::$message;
    }

    public static function updateSize($request, $id)
    {
        self::$size = Size::find($id);
        self::saveBasicInfo(self::$size, $request);
    }

    public static function saveBasicInfo($size, $request)
    {
        $size->name        = $request->name;
        $size->code        = $request->code;
        $size->description = $request->description;
        $size->status      = $request->status;
        $size->save();
    }
}
