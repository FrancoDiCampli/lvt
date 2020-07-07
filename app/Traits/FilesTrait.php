<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;

trait FilesTrait
{
    public static function store($request, $ubicacion, $nombre)
    {
        $path = public_path($ubicacion);
        $nameFile = time() . '_' . $nombre . '.' . $request->file->getClientOriginalExtension();
        if ($request->file->getClientOriginalExtension() == 'jpg' || $request->file->getClientOriginalExtension() == 'png') {
            $image = Image::make($request->file);
            $image->resize(1024, 768, function ($constraint) {
                $constraint->upsize();
            });
            $image->save($path.'/'.$nameFile, 100);
        }

        if ($request->file->getClientOriginalExtension() == 'pdf' || $request->file->getClientOriginalExtension() == 'docx' || $request->file->getClientOriginalExtension() == 'xlsx') {
            $request->file->move($path, $nameFile);
        }

        return $nameFile;
    }
}
