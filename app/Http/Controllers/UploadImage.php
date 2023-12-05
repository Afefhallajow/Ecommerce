<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait UploadImage
{
    public function uploadAndConvert($image)
    {
        /**    Mail::send('afef', [], function ($message) {
        $message->from('your@gmail.com', 'Your Name');
        $message->to('afefhallajow@gmail.com')->subject('Welcome to My Application');
        });
         **/
        //Check for image
            $postimage = $image;
            if ($postimage->getClientOriginalExtension() == 'gif') {
                $filename = time().Str::random(70). '.' . $postimage->getClientOriginalExtension();
                $upload_success = $postimage->move(public_path('/uploads/'), $filename);
            } else {
                $filename = time().Str::random(70). '.' .$postimage->getClientOriginalExtension();
                $upload_success = Image::make($postimage)->save(public_path('/uploads/'. $filename));
            }

            if ($upload_success) {
                return $filename;
            }

    }






}
