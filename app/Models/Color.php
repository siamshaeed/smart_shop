<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    public static $color;
    public static $message;

    public static function newColor($request)
    {
        self::saveBasicInfo(new Color(), $request);
    }

    public static function updateColorStatus($id)
    {
        self::$color = Color::find($id);
        if (self::$color->status == 1) {
            self::$color->status = 0;
            self::$message = 'Color info unpublished successfully';
        } else {
            self::$color->status = 1;
            self::$message = 'Color info published successfully';
        }
        self::$color->save();
    }

    public static function updateColor($request, $id)
    {
        self::$color = Color::find($id);
        self::saveBasicInfo(self::$color, $request);
    }

    public static function saveBasicInfo($Color, $request)
    {
        $Color->name        = $request->name;
        $Color->code        = $request->code;
        $Color->description = $request->description;
        $Color->status      = $request->status;
        $Color->save();
    }
}
