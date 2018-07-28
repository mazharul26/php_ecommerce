<?php

function Redirect($url) {
    echo "<script>self.location='$url';</script>";
}

function RandStr($length) {
    $arr = array_merge(
            array(
        "-",
        "&",
        "%",
        "*",
        "+",
        "_",
        "^",
        "@",
        "\"",
        "/",
        "\\",
        "!",
        "[",
        "]",
        ")",
        "(",
        "#"
            ), range("A", "Z"), range("a", "z"), range(0, 9)
    );
    $str = "";
    while ($length > 0) {
        $str .= $arr[rand(0, count($arr) - 1)];
        $length--;
    }
    return $str;
}

function extension($data) {
    $ext = "";
    if ($data) {
        $ext = pathinfo($data);
        $ext = stripslashes(strtolower($ext['extension']));
        if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
            $ext = "";
        }
    }
    return $ext;
}

function fileNameSecure($data, $prefix = FALSE, $suffix = FALSE) {
    $output = $data;
    if ($prefix)
        $output = $prefix . $output;
    if ($suffix)
        $output = $output . $suffix;
    return md5($output);
}

function resize($path, $save, $width, $height) {
    //
    $info = getimagesize($path);

    // size of the source image
    // 0 is width and 1 is height
    $size = [
        $info[0], // source image width
        $info[1]  // source image height
    ];
    // checking mime and goto image create
    if ($info['mime'] == 'image/png') {
        // for png images
        $src = imagecreatefrompng($path);
    } elseif ($info['mime'] == 'image/jpeg') {
        // for jpg or jpeg images
        $src = imagecreatefromjpeg($path);
    } elseif ($info['mime'] == 'image/gif') {
        // for gif images
        $src = imagecreatefromgif($path);
    } else {
        
    }


    $thumb = imagecreatetruecolor($width, $height);
    imagealphablending($thumb, FALSE);
    imagesavealpha($thumb, TRUE);
    // Aspect ratio kahini
    // aspect ratio of the source image
    $src_aspect = $size[0] / $size[1];
    // aspect ratio of new thumb
    $thumb_aspect = $width / $height;




    // here
    // we wee check if the orginal image is narrow, wide or same
    // we can fine it out by checking
    // original(src) aspect ration is less or greather than thumb aspect arion




    if ($src_aspect < $thumb_aspect) {
        $iamgeis = ' narrow';
        // source image is narrow
        $scale = $width / $size[0];
        $new_size = [
            $width,
            ($width / $src_aspect)
        ];
        $src_pos = [
            0,
            ($size[1] * $scale - $height) / $scale / 2
        ];
    } elseif ($src_aspect > $thumb_aspect) {
        $iamgeis = ' wider';
        // source image is wider
        $scale = $height / $size[1];
        $new_size = [
            $height * $src_aspect,
            $height
        ];
        $src_pos = [
            ($size[0] * $scale - $width) / $scale / 2,
            0
        ];
    } else {
        $iamgeis = ' soman';
        $new_size = [$width, $height];
        $src_pos = [1, 1];
    }

    $new_size[0] = max($new_size[0], 1);
    $new_size[1] = max($new_size[1], 1);


    imagecopyresampled($thumb, $src, 0, 0, $src_pos[0], $src_pos[1], $new_size[0], $new_size[1], $size[0], $size[1]);



//    $output = [
//        'Destination image link resource' => $thumb,
//        'Source image link resource' => $src,
//        'x-coordinate of destination point' => 0,
//        'y-coordinate of destination point' => 0,
//        'x-coordinate of source point' => abs($src_pos[0]),
//        'y-coordinate of source point' => abs($src_pos[1]),
//        'Destination width' => $new_size[0],
//        'Destination height' => $new_size[1],
//        'Source width' => $size[0],
//        'Source height' => $size[1],
//        'Source aspect' => $src_aspect,
//        'Thumb aspect' => $thumb_aspect,
//        'image' => $iamgeis,
//        'scale' => $scale
//    ];
    /// for returning the same image with same extention
    if ($info['mime'] == 'image/png') {
        // for png images
        if ($save == TRUE)
            imagepng($thumb, $save);
        else
            imagepng($thumb);
    }
    elseif ($info['mime'] == 'image/jpeg') {
        // for jpg or jpeg images
        if ($save == TRUE)
            imagejpeg($thumb, $save);
        else
            imagejpeg($thumb);
    }
    elseif ($info['mime'] == 'image/gif') {
        // for gif images
        imagegif($thumb, $save);
    } else {
        
    }
    $output = 'filename';
    return $save;
}

function arrecho($array) {
    //return FALSE;
    
      echo'<pre>';
      print_r($array);
      echo'</pre>';
     
    
}
