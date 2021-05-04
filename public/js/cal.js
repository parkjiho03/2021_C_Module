// 캘린더 클래스
class Cal {
    constructor(el, datas) {
        this.el = document.querySelector(el);
        this.datas = datas;
        this.now = new Date();
        this.nowMonth = this.now.getMonth();
        this.list = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        this.result = [];

        this.init();
    }

    // 초기설정
    init() {
        this.el.innerHTML = "";
        this.template();
        this.getRhddus();
        this.createRhddus();
        this.load(this.newDate(this.nowMonth));
    }

    // 10 안넘을 시 0 추가
    addZero(num) { return (num < 10) ? '0' + num : num; }

    // 특정 날짜 생성
    newDate(month, date = 1) {
        let n = new Date();
        n.setDate(date);
        n.setMonth(month);
        return n;
    }

    // 해당 월 날짜 가져오기
    load(date) {
        let year = date.getFullYear();
        let month = date.getMonth();
        let day = date.getDay();
        let lastDate = this.list[month];
        let tbody = document.createElement('tbody');
        tbody.classList.add("trNm");
        let trtd = '';
        let dNum = 1;

        // if (year % 4 && year % 100 != 0 || year % 400 == 0) lastDate = this.list[1] = 29;

        for (let i = 1; i <= Math.ceil((day + lastDate) / 7); i++) {
            trtd += `<tr class='tr${i}'>`;
            for (let j = 1; j <= 7; j++) {
                if (i == 1 && j <= day || dNum > lastDate) {
                    trtd += "<td class='borderBs' style='width: 100px; height: 100px;'></td>";
                } else {
                    trtd += `<td class='day borderBs' style="width: 100px; height: 100px;" data-date='${year}-${this.addZero(month + 1)}-${this.addZero(dNum)}'>${dNum}</td>`;
                    dNum++;
                }
            }
            trtd += `</tr>`;
        }

        if (this.el.querySelector('tbody') != null) this.el.querySelector('tbody').remove();
        tbody.innerHTML = trtd;
        let cnt = 0;
        tbody.querySelectorAll('.day').forEach(el => {
            if(this.datas != "") {
                this.datas.forEach((x) => {
                    if(el.dataset.date == x.showDate) {
                        let d1 = this.getToday().split("-");
                        let d2 = x.showDate.split("-");
                        let day = "";
                        let days = "";
                        let div = document.createElement("a");
                        div.classList.add("rhddus_date");
                        div.setAttribute("href", "/month/update/"+x.showUid);
                        div.dataset.idx = x.showUid;
                        if(d1[1] == d2[1]) {
                            day = d2[2] - d1[2];
                            div.innerHTML = `
                                <div data-idx="${x.showUid}">${x.showName}(d-${day}일)</div>
                            `;
                            if(day == 0) {
                                div.innerHTML = `
                                    <div data-idx="${x.showUid}">${x.showName}(D-day)</div>
                                `;
                            } else if(day > 0) {
                                div.innerHTML = `
                                    <div data-idx="${x.showUid}">${x.showName}(d-${day}일)</div>
                                `;
                            } else if(day < 0) {
                                div.innerHTML = `
                                    <div data-idx="${x.showUid}">${x.showName}(d-${day}일)</div>
                                `;
                            }
                        } else {
                            if(d1[0] == d2[0]) {
                                if(d1[1] < d2[1]) {
                                    day = d1[2] - d2[2];
                                    let month = d2[1] - d1[1];
                                    let cnt = -1;
                                    let con = 0;
                                    let monthCnt = 0;
                                    for(let i = d1[2]; i <= 31; i++) cnt++;
                                    for(let i = 1; i <= d2[2]; i++) {
                                        con = i;
                                    }
                                    let total = con + cnt;
                                    let totals = con * month + cnt
                                    // console.log(totals);
                                    if(total != 31 && total > 31) {
                                        div.innerHTML = `
                                            <div data-idx="${x.showUid}">${x.showName}(${month}달)</div>
                                        `;
                                    } else if(total < 31) {
                                        div.innerHTML = `
                                            <div data-idx="${x.showUid}">${x.showName}(${total}일)</div>
                                        `;
                                    } else {
                                        div.innerHTML = `
                                            <div data-idx="${x.showUid}">${x.showName}(${month}달)</div>
                                        `;
                                    }
                                }
                            } else {
                                div.innerHTML = `
                                    <div data-idx="${x.showUid}">${x.showName}</div>
                                `;
                            }
                        }
                        el.appendChild(div);
                    }
                });
            }
        });
        
        this.el.querySelector('table').appendChild(tbody);
        this.el.querySelector('.year').innerHTML = year;
        this.el.querySelector('.month').innerHTML = this.addZero(month + 1);
    }
    getToday(){
        let date = new Date();
        let year = date.getFullYear();
        let month = ("0" + (1 + date.getMonth())).slice(-2);
        let day = ("0" + date.getDate()).slice(-2);
    
        return year + "-" + month + "-" + day;
    }

    // 이번 달 가져오기
    getNowMonth = e => {
        this.load(this.newDate(this.now.getMonth()));
    }

    // 이전 월 가져오기
    prev = e => {
        this.load(this.newDate(--this.nowMonth));
    }

    // 다음 월 가져오기
    next = e => {
        this.load(this.newDate(++this.nowMonth));
    }

    template() {
        let div = document.createElement("div");
        div.classList.add("p-3");
        div.innerHTML = `
            <div class="flex-between" style="position:relative;">
                <div class="flex-center font-weight-bold mb-4">
                    <button class="leftBtn prev">이번달</button>
                    <div class="fs-3 mx-4 d-flex"><span class="year"></span>년&nbsp;<span class="month"></span>월</div>
                    <button class="rightBtn next">다음달</button>
                </div>
                <div class="dlfwjd_btn" style="position:absolute;right:0;top:0;">
                    <button class="dlfwjd_add">일정 등록</button>
                </div>
            </div>
            <table class="w-100 my-3 cal_table">
                <thead>
                <tr>
                    <td class="borderB" style="width:100px;height:100px">일</td>
                    <td class="borderB" style="width:100px;height:100px">월</td>
                    <td class="borderB" style="width:100px;height:100px">화</td>
                    <td class="borderB" style="width:100px;height:100px">수</td>
                    <td class="borderB" style="width:100px;height:100px">목</td>
                    <td class="borderB" style="width:100px;height:100px">금</td>
                    <td class="borderB" style="width:100px;height:100px">토</td>
                </tr>
                </thead>
            </table>
        `;
        div.querySelector('.dlfwjd_add').addEventListener('click', this.popup);
        div.querySelector('.prev').addEventListener('click', this.prev);
        div.querySelector('.next').addEventListener('click', this.next);

        this.el.appendChild(div);
    }

    popup = e => {
        $(".calendar_con").fadeIn();
        $(".calendar_close").on("click", () => {
            $(".calendar_con").fadeOut();
        });
    }

    getRhddus() {
        this.result = this.datas.map(x => [x.showUid, x.showDate]).filter(x => x[1].length == 2);
        this.result.forEach(x => {
            if (x[1][1].length < "6") {
                x[1][1] = x[1][0].substring(0, 4) + "." + x[1][1];
            }
            x[1][0] = new Date(x[1][0]);
            x[1][1] = new Date(x[1][1]);
        });
    }

    createRhddus() {
    }
}