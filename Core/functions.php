<?php

function d($data){
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
}

function dd($data){
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
    die;
}