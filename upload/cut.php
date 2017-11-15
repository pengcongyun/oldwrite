<?php
//上传图片后，把图片复制到upload文件夹下面
if($_POST){
    $photo = $_FILES['img']['name'];
    $tmp_addr = $_FILES['img']['tmp_name'];

    $path = 'upload/';
    $type=array("jpg","gif","jpeg","png");
    $tool = substr(strrchr($photo,'.'),1);
    if(!in_array(strtolower($tool),$type)){
        $text=implode('.',$type);
        echo "您只能上传以下类型文件: ",$text,"<br>";
    }else{
        $filename = explode(".",$photo); //把上传的文件名以"."好为准做一个数组。
        $time = date("m-d-H-i-s"); //取当前上传的时间
        $filename[0] = $time; //取文件名
        $name = implode(".",$filename); //上传后的文件名
        $uploadfile = $path.$name;
        $_SESSION['upfile'] = $uploadfile;//上传后的文件名地址
        move_uploaded_file($tmp_addr,$uploadfile);
    }
    // echo $uploadfile;
}
?>