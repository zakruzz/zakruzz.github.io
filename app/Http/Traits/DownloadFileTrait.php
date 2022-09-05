<?php

namespace App\Http\Traits;

trait DownloadFileTrait{

    public function getDownload($path, $fileName) {

        $filePath = public_path($path.$fileName);
        return response()->download($filePath);

    }

}
