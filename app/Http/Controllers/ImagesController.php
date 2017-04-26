<?php

namespace App\Http\Controllers;

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

}