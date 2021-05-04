<?php

namespace src\Controller;

use src\App\DB;

class DeleteController
{
    public function sub1Delete($idx = 0)
    {
        $sql = DB::fetch("SELECT * FROM sub WHERE idx = ?", array($idx));
        if(!$sql) DB::msgBack("없음");
        DB::execute("DELETE FROM sub WHERE idx = ?", array($idx));
        DB::msg("삭제됨", "/sub1");
    }
    

    public function monthDelete($idx = 0)
    {
        $sql = DB::fetch("SELECT * FROM `cal` WHERE showUid = ?", array($idx));
        if(!$sql) DB::msgBack("없음");
        DB::execute("DELETE FROM `cal` WHERE showUid = ?", array($idx));
        DB::msg("삭제됨", "/month");
    }

    public function yearDelete($idx = 0)
    {
        $sql = DB::fetch("SELECT * FROM `cal` WHERE showUid = ?", array($idx));
        if(!$sql) DB::msgBack("없음");
        DB::execute("DELETE FROM `cal` WHERE showUid = ?", array($idx));
        DB::msg("삭제됨", "/year/2021");
    }
}