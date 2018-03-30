<?php
class Response{
    static public function xml($code,$info,$data){

    }
    static public function json($code,$info,$data){
        //是否是数字或数字字符串
        //return 1;
        // return json_encode($code);
        //  return json_encode($data);
        $arr=[

            'code'=>$code,
            'info'=>$info,
            //  'data'=>$data,
        ];

//        return json_encode($arr);
//        exit;
        if(!is_numeric($code)){
            //return 1;
            return false;
        }
        if($info && $data) {
            $arr=array(
                'code'=>$code,
                'info'=>$info,
                'data'=>$data,
            );
            // return 1;
//            var_dump(json_encode($arr) );
            // var_dump(json_encode($arr));
            return json_encode($arr);
        }else{
            // return 1;
            return false;
        }
    }
}
$data=[
    ['name'=>'user1','age'=>'12'],
    ['name'=>'user2','age'=>'12'],
    ['name'=>'user3','age'=>'12'],
    ['name'=>'user4','age'=>'12'],
    ['name'=>'user5','age'=>'12'],
];
//echo json_encode($data);
echo Response::json('200','成功',$data);
