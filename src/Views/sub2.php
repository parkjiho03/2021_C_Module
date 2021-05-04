<style>
    .content {
    margin-top:10px;
    padding-top:10px;
    border-top:1px solid #000;
}
</style>
<div class="container">
    <div class="content-top">
        <h1>월간 공연 일정</h1>
        <div class="nav">
            <a href="#">메인</a> >
            <a href="#">행사안내</a> >
            <a href="#">공연</a> > 
            <a class="content_page" href="#">월간 공연 일정</a>
        </div>
    </div>
    <div class="content">
        <div class="calendar">
        </div>
    </div>
</div>
<div class="calendar_con">
    <form action="/month/insert" method="POST" class="calendar_form">
        <div class="calendar_close">
            <p>&times;</p>
        </div>
        <div class="calendar_form_input">
            <label>공연명</label>
            <input type="text" name="showName" placeholder="공연명" required>
        </div>
        <div class="calendar_form_input">
            <label>공연일</label>
            <input type="date" name="showDate" placeholder="공연일" required>
        </div>
        <div class="calendar_form_input">
            <label>공연시간</label>
            <input type="time" name="showTime" placeholder="공연시간" required>
        </div>
        <div class="calendar_form_input">
            <label>주관</label>
            <input type="text" name="organizer" placeholder="주관">
        </div>
        <div class="calendar_form_input">
            <label>공연장소</label>
            <input type="text" name="place" placeholder="공연장소">
        </div>
        <div class="calendar_form_input">
            <label>출연진</label>
            <input type="text" name="cast" placeholder="출연진">
        </div>
        <div class="calendar_form_input">
            <label>공연내용</label>
            <input type="text" name="rm" placeholder="공연내용">
        </div>
        <div class="cal_btn">
            <button type="submit">등록</button>
        </div>
    </form>
</div>
<style>
    .calendar_form {
        border-radius:5px;
        padding:20px;
        width:400px;
        height:600px;
    }
    .calendar_form_input {
        height:70px;
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
</style>
<script src="/js/cal.js"></script>
<script>
    window.addEventListener("load", () => {
        const datas = <?= json_encode($date) ?>;
        const cal = new Cal(".calendar", datas);
    });
</script>