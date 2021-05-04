<style>
    .sub1_update_form_con {
        width:100%;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .sub1_update_input_con {
        width:100%;
        display:grid;
        grid-template-columns:1fr 1fr;
        grid-gap:20px;
    }

    .sub1_update_input {
        width:100%;
        height:80px;
    }

    .sub1_update_input > input {
        width:100%;
        outline:none;
    }

    .sub1_update_btns {
        padding:0 50px;
        width:100%;
        height:80px;
        display:flex;
        align-items:center;
        justify-content:space-between;
    }
    .sub1_update_form {
        padding:50px 0;
    }
</style>
<div class="sub1_update_form_con">
    <form method="POST" class="sub1_update_form" action="/sub1/update" enctype="multipart/form-data">
        <input type="text" name="idx" value="<?= $data->idx ?>" hidden>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>종목코드</label>
                <input type="text" name="ccbaKdcd" value="<?= $data->ccbaKdcd ?>" placeholder="종목코드" required>
            </div>
            <div class="sub1_update_input">
                <label>지정번호</label>
                <input type="text" name="ccbaAsno" value="<?= $data->ccbaAsno ?>" placeholder="지정번호" required>
            </div>
        </div>
        <div class="sub1_update_input_con">

            <div class="sub1_update_input">
                <label>시도코드</label>
                <input type="text" name="ccbaCtcd" value="<?= $data->ccbaCtcd ?>" placeholder="시도코드" required>
            </div>
            <div class="sub1_update_input">
                <label>연계번호</label>
                <input type="text" name="ccbaCpno" value="<?= $data->ccbaCpno ?>" placeholder="연계번호">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>경도</label>
                <input type="text" name="longitude" value="<?= $data->longitude ?>" placeholder="경도">
            </div>
            <div class="sub1_update_input">
                <label>위도</label>
                <input type="text" name="latitude" value="<?= $data->latitude ?>" placeholder="위도">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>문화재종목</label>
                <input type="text" name="ccmaName" value="<?= $data->ccmaName ?>" placeholder="문화재종목" required>
            </div>
            <div class="sub1_update_input">
                <label>지정호수</label>
                <input type="text" name="crltsnoNm" value="<?= $data->crltsnoNm ?>" placeholder="지정호수" required>
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>문화재명(국문)</label>
                <input type="text" name="ccbaMnm1" value="<?= $data->ccbaMnm1 ?>" placeholder="문화재명(국문)" required>
            </div>
            <div class="sub1_update_input">
                <label>문화재명(한자)</label>
                <input type="text" name="ccbaMnm2" value="<?= $data->ccbaMnm2 ?>" placeholder="문화재명(한자)">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>문화재분류</label>
                <input type="text" name="gcodeName" value="<?= $data->gcodeName ?>" placeholder="문화재분류">
            </div>
            <div class="sub1_update_input">
                <label>문화재분류2(종류)</label>
                <input type="text" name="bcodeName" value="<?= $data->bcodeName ?>" placeholder="문화재분류2(종류)">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>문화재분류3</label>
                <input type="text" name="mcodeName" value="<?= $data->mcodeName ?>" placeholder="문화재분류3">
            </div>
            <div class="sub1_update_input">
                <label>문화재분류4</label>
                <input type="text" name="scodeName" value="<?= $data->scodeName ?>" placeholder="문화재분류4">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>수량</label>
                <input type="text" name="ccbaQuan" value="<?= $data->ccbaQuan ?>" placeholder="수량">
            </div>
            <div class="sub1_update_input">
                <label>저정(등록일)</label>
                <input type="text" name="ccbaAsdt" value="<?= $data->ccbaAsdt ?>" placeholder="지정(등록일)">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>시도명</label>
                <input type="text" name="ccbaCtcdNm" value="<?= $data->ccbaCtcdNm ?>" placeholder="시도명">
            </div>
            <div class="sub1_update_input">
                <label>시군구명</label>
                <input type="text" name="ccsiName" value="<?= $data->ccsiName ?>" placeholder="시군구명">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>소재지 상세</label>
                <input type="text" name="ccbaLcad" value="<?= $data->ccbaLcad ?>" placeholder="소재지 상세">
            </div>
            <div class="sub1_update_input">
                <label>시대</label>
                <input type="text" name="ccceName" value="<?= $data->ccceName ?>" placeholder="시대">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>소유자</label>
                <input type="text" name="ccbaPoss" value="<?= $data->ccbaPoss ?>" placeholder="소유자">
            </div>
            <div class="sub1_update_input">
                <label>관리자</label>
                <input type="text" name="ccbaAdmin" value="<?= $data->ccbaAdmin ?>" placeholder="관리자">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>지정해제여부</label>
                <input type="text" name="ccbaCncl" value="<?= $data->ccbaCncl ?>" placeholder="지정해제여부">
            </div>
            <div class="sub1_update_input">
                <label>지정해제일</label>
                <input type="text" name="ccbaCndt" value="<?= $data->ccbaCndt ?>" placeholder="지정해제일">
            </div>
        </div>
        <div class="sub1_update_input_con">
            <div class="sub1_update_input">
                <label>이미지</label>
                <input type="file" id="image" name="image[]" value="<?= $data->image ?>">
            </div>
            <div class="sub1_update_input">
                <label>설명</label>
                <input type="text" name="content" value="<?= $data->content ?>" placeholder="설명">
            </div>
        </div>
        <input type="text" id="imageTest" name="images" value="<?= $data->image ?>" hidden>
        <?php if ($data->image != "") : ?>
            <script>
                $("#imageTest").remove();
            </script>
            <div>
                <a href="/sub1/delete/image/<?= $data->idx ?>"><button class="btn btn-danger" type="button">이미지 삭제</button></a>
                <label for="image" class="ml-3"><?= $data->image ?></label>
                <input type="text" name="images" value="<?= $data->image ?>">
            </div>
        <?php endif; ?>
        <div class="sub1_update_btns">
            <a href="/sub1/delete/<?= $data->idx ?>" class="btn btn-danger">삭제</a>
            <button class="btn btn-primary" type="submit">수정</button>
        </div>
    </form>
</div>
<script>
    window.addEventListener("load", () => {
        let data = <?= json_encode($data) ?>;
    });
</script>