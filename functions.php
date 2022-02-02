<?php 

function isChecked($inputName, $value){
    if(isset($_REQUEST[$inputName]) && in_array($value, $_REQUEST[$inputName])){
        echo "checked";
    }
}

function selectPption($options, $sv){
    if(is_array($options) ){
        foreach($options as $option){
            $selected = '';
            $option = strtolower($option);
            if(in_array($option, $sv)){
                $selected = 'selected';
            }
            printf("<option value='%s' %s>%s</option>", $option, $selected, ucwords($option));
        }
    }
}


// Save signle vale in select feaild
// function selectPption($options, $sv){
//     if(is_array($options) ){
//         foreach($options as $option){
//             $option = strtolower($option);
//             $selected = '';
//             if($sv == $option){
//                 $selected = 'selected';
    
//             }
//             printf("<option value='%s' %s>%s</option>", $option, $selected, ucwords($option));
//         }
//     }
// }