    <!-- 무형문화재 -->
    <div class="container">
        <div class="content-top" style="padding-top:20px;">
            <h1>무형문화재현황</h1>
            <div class="nav">
                <a href="#">메인</a> >
                <a href="#">무형문화제현황</a> > 
                <a class="nav_list_btn" href="#">전체</a>
            </div>
        </div>

        <div class="content_info">
            <p>총 10건 1p / 1p</p>
            <div class="content_btns">
                <div class="content_btn active" id="album">앨범</div>
                <div class="content_btn" id="list">목록</div>
            </div>
        </div>
        
        <div class="content">
            <div class="angud_add_btn">
                <button>등록</button>
            </div>
            <div class="angud_none_content">
                <h1>해당하는 데이터가 존재하지 않습니다.</h1>
            </div>
            <div class="angud_content"></div>
            <div class="angud_table_content none">
                <table class="angud_table table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">순번</th>
                            <th scope="col">종목</th>
                            <th scope="col">명칭</th>
                            <th scope="col">소재지</th>
                            <th scope="col">관리자(단체)</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="paginations page_list">
            <div class="page_item page_first disabled"><a class="disabled"><<</a></div>
            <div class="page_item page_prev disabled"><a class="disabled"><</a></div>
            <div class="page_item now"><a href="#">1</a></div>
            <div class="page_item"><a href="#">2</a></div>
            <div class="page_item"><a href="#">3</a></div>
            <div class="page_item"><a href="#">4</a></div>
            <div class="page_item"><a href="#">5</a></div>
            <div class="page_item"><a href="#">6</a></div>
            <div class="page_item"><a href="#">7</a></div>
            <div class="page_item"><a href="#">8</a></div>
            <div class="page_item"><a href="#">9</a></div>
            <div class="page_item"><a href="#">10</a></div>
            <div class="page_item page_next"><a>></a></div>
            <div class="page_item page_end"><a>>></a></div>
        </div>
    </div>
    <div class="angud_popup_bg">
        <form class="angud_popup" method="POST" action="/sub1/insert" enctype="multipart/form-data">
            <p class="popup_close">&times;</p>
            <div>
                <input type="text" name="ccbaKdcd" placeholder="종목코드" required>
            </div>
            <div>
                <input type="text" name="ccbaAsno" placeholder="지정번호" required>
            </div>
            <div>
                <input type="text" name="ccbaCtcd" placeholder="시도코드" required>
            </div>
            <div>
                <input type="text" name="ccbaCpno" placeholder="연계번호">
            </div>
            <div>
                <input type="text" name="longitude" placeholder="경도">
            </div>
            <div>
                <input type="text" name="latitude" placeholder="위도">
            </div>
            <div>
                <input type="text" name="ccmaName" placeholder="문화재종목" required>
            </div>
            <div>
                <input type="text" name="crltsnoNm" placeholder="지정호수" required>
            </div>
            <div>
                <input type="text" name="ccbaMnm1" placeholder="문화재명(국문)" required>
            </div>
            <div>
                <input type="text" name="ccbaMnm2" placeholder="문화재명(한자)">
            </div>
            <div>
                <input type="text" name="gcodeName" placeholder="문화재분류">
            </div>
            <div>
                <input type="text" name="bcodeName" placeholder="문화재분류2(종류)">
            </div>
            <div>
                <input type="text" name="mcodeName" placeholder="문화재분류3">
            </div>
            <div>
                <input type="text" name="scodeName" placeholder="문화재분류4">
            </div>
            <div>
                <input type="text" name="ccbaQuan" placeholder="수량">
            </div>
            <div>
                <input type="text" name="ccbaAsdt" placeholder="지정(등록일)">
            </div>
            <div>
                <input type="text" name="ccbaCtcdNm" placeholder="시도명">
            </div>
            <div>
                <input type="text" name="ccsiName" placeholder="시군구명">
            </div>
            <div>
                <input type="text" name="ccbaLcad" placeholder="소재지 상세">
            </div>
            <div>
                <input type="text" name="ccceName" placeholder="시대">
            </div>
            <div>
                <input type="text" name="ccbaPoss" placeholder="소유자">
            </div>
            <div>
                <input type="text" name="ccbaAdmin" placeholder="관리자">
            </div>
            <div>
                <input type="text" name="ccbaCncl" placeholder="지정해제여부">
            </div>
            <div>
                <input type="text" name="ccbaCndt" placeholder="지정해제일">
            </div>
            <div>
                <input type="file" name="image[]" placeholder="이미지">
            </div>
            <div>
                <input type="text" name="content" placeholder="설명">
            </div>
            <div>
                <button type="submit">등록</button>
            </div>
        </form>
    </div>
    <script src="/js/pagination.js"></script>
    <script src="/js/sub1.js"></script>
    <script>
        window.addEventListener("load", () => {
            const datas = <?= json_encode($data) ?>;
            const app = new App(datas);
        });
    </script>