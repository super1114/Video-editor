<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use ProtoneMedia\Laravel\FFMpeg\FFMpeg;
use FFMpeg;
// use FFMpeg\FFProbe;

class MediaController extends Controller
{
    /**
     * Storing data:/image/png:base64 into real file
     */

    function base64_to_jpeg($base64_string, $output_file) {
        // open the output file for writing
        $filePath = public_path('storage/uploads/trunkStates');

        if (!file_exists(public_path('storage/uploads')))
            mkdir(public_path('storage/uploads'));
        if (!file_exists(public_path('storage/uploads/trunkStates')))
            mkdir(public_path('storage/uploads/trunkStates'));

        $output_file = public_path('storage/uploads/trunkStates'.$output_file);
        $ifp = fopen( $output_file, 'wb' ); 
    
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );
        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[1] ));
        // clean up the file resource
        fclose( $ifp ); 
        return $output_file; 
    }

    function deleteExistingFile($current) {
        if (!str_contains($current, 'htt'))
            return;
        $current = str_replace(env('APP_URL'), '', $current);
        $current = public_path($current);
        unlink($current);
    }

    /**
     * 
     * @param
     * @return url of the saved image
     */
    public function saveImage(Request $request) {
        $this->deleteExistingFile($request->current_Url);

        $imageData = $request->input('data');
        $imageName = time().'_'.$request->input('name');
        $filePath = '/'.$imageName;
        $this->base64_to_jpeg($imageData, $filePath);
        $filePath = env('APP_URL').'/storage/uploads/trunkStates'.$filePath;

        return response()->json(['filePath' => $filePath]);
    }


    /**
     * 
     * @param
     * @return url of the saved video
     */
    public function saveVideo(Request $request) {
        
        if (!file_exists(public_path('storage/uploads')))
            mkdir(public_path('storage/uploads'));
        if (!file_exists(public_path('storage/uploads/videos')))
            mkdir(public_path('storage/uploads/videos'));
        if (!file_exists(public_path('storage/uploads/converted_videos')))
            mkdir(public_path('storage/uploads/converted_videos'));

        $file = tap($request->file('video'))->store('/public/uploads/videos');
        $filename = pathInfo($file->hashName(), PATHINFO_FILENAME);
        

        $temp = FFMpeg::fromDisk('local')
            ->open('/public/uploads/videos/'.$file->hashName())
            ->export()
            ->toDisk('local')
            ->inFormat(new \FFMpeg\Format\Video\X264)
            ->save('/public/uploads/converted_videos/'.$filename.'.mp4');
        $filePath = env('APP_URL').'/storage/uploads/converted_videos/'.$filename.'.mp4';        
        return response()->json(['filePath' => $filePath]);
    }
}