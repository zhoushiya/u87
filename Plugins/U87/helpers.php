<?php

function getStrTime(){
    $no=date("H",time());
    if ($no>0&&$no<=6){
        return "凌晨好";
    }
    if ($no>6&&$no<12){
        return "上午好";
    }
    if ($no>=12&&$no<=18){
        return "下午好";
    }
    if ($no>18&&$no<=24){
        return "晚上好";
    }
    return "您好";
}

if(!function_exists('randBg')){
	function randBg(){
		$data= ['blue','azure','indigo','purple','pink','red','orange','yellow','lime','green','teal','cyan'];
		return $data[array_rand($data)];
	}
}

