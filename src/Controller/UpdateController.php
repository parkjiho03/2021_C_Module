<?php

namespace src\Controller;

use src\App\DB;

class UpdateController
{
    public function sub1Update()
    {
        extract($_POST);
        if(trim($ccbaKdcd) == "" && trim($ccbaAsno) == "" && trim($ccbaCtcd) == "" && trim($ccbaKdcd) && trim($ccmaName) == "" && trim($crltsnoNm) == "" && trim($ccbaMnm1) == "") {
            DB::msgBack("필수데이터가 비었음");
        }
        $img = "";
        $imgs = filesUpload($_FILES['image']);
        // var_dump($_FILES['image']);
        if($imgs != null) {
            $img = $imgs[0];
        }
        if(trim($images) == "") {
            $array = array($ccbaKdcd, $ccbaAsno, $ccbaCtcd, $ccbaCpno, $longitude, $latitude, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $ccbaCtcdNm, $ccsiName, $ccbaAdmin, $ccbaCncl, $ccbaCndt, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaLcad, $ccceName, $ccbaPoss, $content, $img, $idx);
        } else {
            if(trim($img) == "") {
                $array = array($ccbaKdcd, $ccbaAsno, $ccbaCtcd, $ccbaCpno, $longitude, $latitude, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $ccbaCtcdNm, $ccsiName, $ccbaAdmin, $ccbaCncl, $ccbaCndt, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaLcad, $ccceName, $ccbaPoss, $content, $images, $idx);
            } else {
                $array = array($ccbaKdcd, $ccbaAsno, $ccbaCtcd, $ccbaCpno, $longitude, $latitude, $ccmaName, $crltsnoNm, $ccbaMnm1, $ccbaMnm2, $ccbaCtcdNm, $ccsiName, $ccbaAdmin, $ccbaCncl, $ccbaCndt, $gcodeName, $bcodeName, $mcodeName, $scodeName, $ccbaQuan, $ccbaAsdt, $ccbaLcad, $ccceName, $ccbaPoss, $content, $img, $idx);
            }
        }
        DB::execute("UPDATE `sub` SET `ccbaKdcd` = ?, `ccbaAsno` = ?, `ccbaCtcd` = ?, `ccbaCpno` = ?, `longitude` = ?, `latitude` = ?, `ccmaName` = ?, `crltsnoNm` = ?, `ccbaMnm1` = ?, `ccbaMnm2` = ?, `ccbaCtcdNm` = ?, `ccsiName` = ?, `ccbaAdmin` = ?, `ccbaCncl` = ?, `ccbaCndt` = ?, `gcodeName` = ?, `bcodeName` = ?, `mcodeName` = ?, `scodeName` = ?, `ccbaQuan` = ?, `ccbaAsdt` = ?, `ccbaLcad` = ?, `ccceName` = ?, `ccbaPoss` = ?, `content` = ?, `image` = ? WHERE idx = ?", $array);
        DB::msg("수정됨", "/sub1");
    }

    public function sub1ImageDelete($idx = 0)
    {
        DB::execute("UPDATE sub SET image = '' WHERE idx = ?", array($idx));
        DB::msg("이미지 삭제됨", "/sub1/update/" . $idx);
    }

    public function yearUpdate() {
        extract($_POST);
        if(trim($showName) == "" && trim($showDate) == "" && trim($showTime) == "") {
            DB::msgBack("필수데이터가 비었음");
        }
        $updtDt = date("Y-m-d", time());
        $array = array($showName, $showDate, $showTime, $organizer, $place, $cast, $rm, $updtDt, $showUid);
        DB::execute("UPDATE cal SET `showName` = ?, `showDate` = ?, `showTime` = ?, `organizer` = ?, `place` = ?, `cast` = ?, `rm` = ?, `updtDt` = ? WHERE showUid = ?", $array);
        DB::msg("수정됨", "/year/2021");
    }

    public function monthUpdate() {
        extract($_POST);
        if(trim($showName) == "" && trim($showDate) == "" && trim($showTime) == "") {
            DB::msgBack("필수데이터가 비었음");
        }
        $updtDt = date("Y-m-d", time());
        $array = array($showName, $showDate, $showTime, $organizer, $place, $cast, $rm, $updtDt, $showUid);
        DB::execute("UPDATE cal SET `showName` = ?, `showDate` = ?, `showTime` = ?, `organizer` = ?, `place` = ?, `cast` = ?, `rm` = ?, `updtDt` = ? WHERE showUid = ?", $array);
        DB::msg("수정됨", "/month");
    }
}