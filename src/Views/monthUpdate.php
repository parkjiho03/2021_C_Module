<style>
    .sub1_update_form_con {
        width:100%;
        display:flex;
        align-items:center;
        justify-content:center;
    }

    .calendar_forms {
        padding:20px;
        width:400px;
        height:600px;
    }
    .calendar_form_input {
        height:80px;
    }
    .calendar_form_input > input {
        margin:0 10px;
        width:340px;
        outline:none;
        padding:3px 7px;
    }
    .cal_btn {
        margin-top:10px;
        text-align:right;
    }

    .cal_btn > button {
        cursor:pointer;
        outline:none;
    }
    .calendar_close {
        top:-5px;
    }
    .sub1_update_form_con {
        padding:50px 0;
    }
</style>
<div class="sub1_update_form_con">
    <form class="calendar_forms" action="/month/update" method="POST">
        <input type="text" name="showUid" value="<?= $date->showUid ?>" hidden>
        <div class="calendar_form_input">
            <label>공연명</label>
            <input type="text" name="showName" value="<?= $date->showName ?>" placeholder="공연명" required>
        </div>
        <div class="calendar_form_input">
            <label>공연일</label>
            <input type="date" name="showDate" value="<?= $date->showDate ?>" placeholder="공연일" required>
        </div>
        <div class="calendar_form_input">
            <label>공연시간</label>
            <input type="time" name="showTime" value="<?= $date->showTime ?>" placeholder="공연시간" required>
        </div>
        <div class="calendar_form_input">
            <label>주관</label>
            <input type="text" name="organizer" value="<?= $date->organizer ?>" placeholder="주관">
        </div>
        <div class="calendar_form_input">
            <label>공연장소</label>
            <input type="text" name="place" value="<?= $date->place ?>" placeholder="공연장소">
        </div>
        <div class="calendar_form_input">
            <label>출연진</label>
            <input type="text" name="cast" value="<?= $date->cast ?>" placeholder="출연진">
        </div>
        <div class="calendar_form_input">
            <label>공연내용</label>
            <input type="text" name="rm" value="<?= $date->rm ?>" placeholder="공연내용">
        </div>
        <div class="cal_btn">
            <a href="/month/delete/<?= $date->showUid ?>" class="btn btn-danger">삭제</a>
            <button type="submit" class="btn btn-primary">수정</button>
        </div>
    </form>
</div>