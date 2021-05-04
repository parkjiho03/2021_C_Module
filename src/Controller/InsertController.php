<?php

namespace src\Controller;

use src\App\DB;

class InsertController
{
    public function sub1Insert()
    {
        extract($_POST);

        if(trim($ccbaKdcd) == "" && trim($ccbaAsno) == "" && trim($ccbaCtcd) == "" && trim($ccbaKdcd) && trim($ccmaName) == "" && trim($crltsnoNm) == "" && trim($ccbaMnm1) == "") {
            DB::msgBack("필수데이터가 비었음");
        }
        $img = "";
        $imgs = filesUpload($_FILES['image']);
        if($imgs != null) {
            $img = $imgs[0];
        }
        if(trim($img) == "") {
            $array = array($ccbaKdcd, $ccbaAsno, $ccbaCtcd, $ccbaCpno, $longitude, $latitude, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $ccbaCtcdNm, $ccsiName, $ccbaAdmin, $ccbaCncl, $ccbaCndt, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaLcad, $ccceName, $ccbaPoss, $content, $img);
        } else {
            $array = array($ccbaKdcd, $ccbaAsno, $ccbaCtcd, $ccbaCpno, $longitude, $latitude, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $ccbaCtcdNm, $ccsiName, $ccbaAdmin, $ccbaCncl, $ccbaCndt, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaLcad, $ccceName, $ccbaPoss, $content, $img);
        }
        DB::execute("INSERT INTO sub(ccbaKdcd, ccbaAsno, ccbaCtcd, ccbaCpno, longitude, latitude, ccmaName, crltsnoNm, ccbaMnm1, ccbaMnm2, ccbaCtcdNm, ccsiName, ccbaAdmin, ccbaCncl, ccbaCndt, gcodeName, bcodeName, mcodeName, scodeName, ccbaQuan, ccbaAsdt, ccbaLcad, ccceName, ccbaPoss, content, image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $array);
        
        DB::msg("등록됨", "/sub1");
    }

    public function monthInsert()
    {
        extract($_POST);

        if(trim($showName) == "" && trim($showDate) == "" && trim($showTime) == "") {
            DB::msgBack("필수데이터가 비었음");
        }
        $registDt = date("Y-m-d", time());
        $updtDt = "";
        $array = array($showName, $showDate, $showTime, $organizer, $place, $cast, $rm, $registDt, $updtDt);
        DB::execute("INSERT INTO cal(showName, showDate, showTime, organizer, place, cast, rm, registDt, updtDt) VALUES (?,?,?,?,?,?,?,?,?)", $array);
        DB::msg("등록됨", "/month");
    }
}