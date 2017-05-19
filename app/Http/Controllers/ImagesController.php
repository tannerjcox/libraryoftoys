<?php

namespace App\Http\Controllers;

use App\Image;
use Response;
use Illuminate\Http\Request;

class ImagesController
{
    public function upload(Request $request)
    {
        $path = $request->file->store('', 'uploads');

        if ($path) {
            return Response::json([
                'success' => 200,
                'path' => $path
            ]);
        } else {
            return Response::json('error', 400);
        }
    }

    public function destroy(Image $image)
    {
        if($image) {
            \File::delete(public_path($image->path . $image->name));
            \File::delete(public_path($image->path . 'thumbs/' . $image->name));
            \File::delete(public_path($image->path . 'medium/' . $image->name));
            $image->delete();
        }

        return Response::json([
            'success' => true
        ]);
    }
}