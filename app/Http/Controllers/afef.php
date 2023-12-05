<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Validator;

class afef extends Controller
{
    public function uploadAndConvert(Request $request)
    {
/**    Mail::send('afef', [], function ($message) {
        $message->from('your@gmail.com', 'Your Name');
        $message->to('afefhallajow@gmail.com')->subject('Welcome to My Application');
    });
**/
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //Check for image
        if ($validator->passes()) {
            $postimage = $request->file('image');
            if ($postimage->getClientOriginalExtension() == 'gif') {
                $filename = time() . '.' . $postimage->getClientOriginalExtension();
                $upload_success = $postimage->move(public_path('/uploads/'), $filename);
            } else {
                $filename = time() . '.' .'avif';
                $upload_success = Image::make($postimage)->resize(860, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('/uploads/'. $filename));
            }

            if ($upload_success) {
                return response()->json(['success'=>$filename]);
            }
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

}
