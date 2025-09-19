<?php

function countTable($tabla){
    $return = DB::select("SELECT count(*) as suma FROM $tabla")[0];
    return $return->suma;
}