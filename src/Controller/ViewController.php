<?php

namespace src\Controller;

use src\App\DB;

use function PHPSTORM_META\type;

class ViewController
{
    public function index()
    {
        $datas['title'] = "메인";
        view("index", $datas);
    }

    public function phone()
    {
        $datas['title'] = "전화번호";
        view("phone", $datas);
    }

    public function history()
    {
        $datas['title'] = "연혁";
        view("history", $datas);
    }

    public function sub1()
    {
        $datas['title'] = "무형문화재현황";
        $datas['data'] = DB::fetchAll("SELECT * FROM sub");
        view("sub1", $datas);
    }

    public function sub1Data($data = "") 
    {
        if($data == "one") $data = "전통 공연·예술";
        if($data == "two") $data = "전통기술";
        if($data == "three") $data = "전통지식";
        if($data == "four") $data = "구전 전통 및 표현";
        if($data == "five") $data = "전통 생활관습";
        if($data == "six") $data = "의례·의식";
        if($data == "seven") $data = "전통 놀이·무예";
        $datas['title'] = "무형문화재메뉴";
        $datas['data'] = DB::fetchAll("SELECT * FROM sub WHERE bcodeName = ?", array($data));
        view("sub1", $datas);
    }

    public function sub1Update($idx = 0)
    {
        $datas['title'] = "무형문화재리스트보기";
        $datas['data'] = DB::fetch("SELECT * FROM sub WHERE idx = ?", array($idx));
        view("sub1Update", $datas);
    }

    public function year($year)
    {
        $datas['title'] = "연간 공연 일정";
        $datas['year'] = $year;
        $datas['date'] = DB::fetchAll("SELECT * FROM cal WHERE showDate like ? ORDER BY showDate ASC", array("%" . $year . "%"));
        view("year", $datas);
    }

    public function yearView($idx = 0) 
    {
        $datas['title'] = "연간 공연 일정보기";
        $datas['date'] = DB::fetch("SELECT * FROM cal WHERE showUid = ?", array($idx));
        view("yearUpdate", $datas);
    }

    public function month()
    {
        $datas['title'] = "월간 공연 일정";
        $datas['date'] = DB::fetchAll("SELECT * FROM cal");
        view("sub2", $datas);
    }
    public function monthView($idx = 0)
    {
        $datas['title'] = "월간 공연 일정";
        $datas['date'] = DB::fetch("SELECT * FROM cal WHERE showUid = ?", array($idx));
        view("monthUpdate", $datas);
    }


    public function getImage($name = "")
    {
        header('Content-type:image/jpg');
        readfile(__NIMGS . __DS . $name);
    }

    public function openAPI()
    {
        $pageNo = $_GET['pageNo'];
        $numOfRows = $_GET['numOfRows'];
        $result = [];
        $count = [];
        if (isset($_GET['bcodeName'])) {
            $bcodeName = $_GET['bcodeNaem'];
            $sql = "SELECT ccbaKdcd, ccbaAsno, ccbaCtcd, ccbaCpno, longitude, latitude, ccmaName, crltsnoNm, ccbaMnm1, ccbaMnm2, gcodeName, bcodeName, mcodeName, scodeName, ccbaQuan, ccbaAsdt, ccbaCtcdNm, ccsiName, ccbaLcad, ccceName, ccbaPoss, ccbaAdmin, ccbaCncl, ccbaCndt, image, content FROM sub WHERE bcodeName LIKE ? LIMIT " . ($pageNo - 1) * $numOfRows . "," . $numOfRows;
            $datas = [
                "%" . $bcodeName . "%"
            ];
            $result = DB::fetchAll($sql, $datas);
            $count = DB::fetchAll("SELECT * FROM sub WHERE bcodeName LIKE ?", [$bcodeName]);
        } else {
            $sql = "SELECT ccbaKdcd, ccbaAsno, ccbaCtcd, ccbaCpno, longitude, latitude, ccmaName, crltsnoNm, ccbaMnm1, ccbaMnm2, gcodeName, bcodeName, mcodeName, scodeName, ccbaQuan, ccbaAsdt, ccbaCtcdNm, ccsiName, ccbaLcad, ccceName, ccbaPoss, ccbaAdmin, ccbaCncl, ccbaCndt, image, content FROM sub LIMIT " . ($pageNo - 1) * $numOfRows . "," . $numOfRows;
            $result = DB::fetchAll($sql);
            $count = DB::fetchAll("SELECT * FROM sub");
        }

        foreach ($result as $item) {
            $file = __NIMGS . "/$item->image";
            if (file_exists($file) && $file != "") {
                $base64 = base64_encode(file_get_contents($file));
                $item->image = "data:" . mime_content_type($file) . ";base64," . $base64;
            } else {
                $item->image = "";
            }
        }

        $json = [
            "numOfRows" => $numOfRows,
            "pageNo" => $pageNo,
            "totalCount" => count($count),
            "items" => $result
        ];

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }

    public function openAPIs()
    {
        extract($_GET);
        $datas = [];
        if (isset($searchType)) {
            if ($searchType == "Y" && isset($year)) {
                $datas = DB::fetchAll("SELECT * FROM cal WHERE showDate like ?", array("%" . $year . "%"));
            }

            if ($searchType == "M" && isset($month)) {
                $datas = DB::fetchAll("SELECT * FROM cal WHERE showDate like ? AND substring(date, 6, 2) like ?", array("%" . $year . "%", "%" . $month . "%"));
            }
        }

        $json = [
            "searchType" => isset($searchType) ? $searchType : "",
            "year" => isset($year) ? $year : "",
            "month" => isset($month) ? $month : "",
            "totalCount" => count($datas),
            "items" => $datas,
        ];

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }

    public function sub1Info() 
    {
        $datas['title'] = "무형문화재 조희 현황";
        view("sub1_info", $datas);
    }

    public function sub2Info()
    {
        $datas['title'] = "일정 조회 메뉴";
        view("sub2_info", $datas);
    }

    public static function init()
    {
        if (DB::fetch("show table status like 'sub'")->Auto_increment == 1) {
            $xml = simplexml_load_file("http://localhost/xml/nihList.xml");
            foreach ($xml->item as $key => $item) {
                $array = array($item->ccbaKdcd, $item->ccbaAsno, $item->ccbaCtcd, $item->ccbaCpno, $item->longitude, $item->latitude, $item->ccmaName, $item->crltsnoNm, $item->ccbaMnm1, $item->ccbaMnm2, $item->ccbaCtcdNm, $item->ccsiName, $item->ccbaAdmin, $item->ccbaCncl);
                $xmls = simplexml_load_file("http://localhost/xml/detail/".$item->ccbaKdcd."_".$item->ccbaCtcd."_".$item->ccbaAsno.".xml");
                foreach ($xmls->item as $key => $items) {
                    // gcodeName, bcodeName, mcodeName, scodeName, ccbaQuan, ccbaAsdt, ccbaLcad, ccceName, ccbaPoss, content, image
                    $arrays = array($items->ccbaCndt, $items->gcodeName, $items->bcodeName, $items->mcodeName, $items->scodeName, $items->ccbaQuan, $items->ccbaAsdt, $items->ccbaLcad, $items->ccceName, $items->ccbaPoss, $items->content, $items->imageUrl);
                    $arr = array_merge($array, $arrays);
                    DB::execute("INSERT INTO sub(ccbaKdcd, ccbaAsno, ccbaCtcd, ccbaCpno, longitude, latitude, ccmaName, crltsnoNm, ccbaMnm1, ccbaMnm2, ccbaCtcdNm, ccsiName, ccbaAdmin, ccbaCncl, ccbaCndt, gcodeName, bcodeName, mcodeName, scodeName, ccbaQuan, ccbaAsdt, ccbaLcad, ccceName, ccbaPoss, content, image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $arr);
                }
            }
        }
    }
}

ViewController::init();