<?php

function upload_image($request, $context){

    if(move_uploaded_file($_FILES['image']['tmp_name'],"images/".$_FILES['image']['name'])) {
        $image = "https://pedago02a.univ-avignon.fr/~uapv1901496/images/".$_FILES['image']['name'];
    }
    else {
        $image = "";
    }
}
