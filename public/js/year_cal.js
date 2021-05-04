class YearCal {
    constructor(el, top, datas, year) {
        this.el = document.querySelector(el);
        this.top = document.querySelector(top);
        this.years = year;
        this.datas = datas;
        this.now = new Date();
        this.nowYear = this.now.getFullYear();
        this.monthArr = [];
        this.datas.forEach((x) => {
            let d = x.showDate.split("-");
            if (!this.monthArr.includes(d[1])) this.monthArr.push(d[1]);
        });
        this.init();
    }

    init() {
        this.template();
        this.load(this.newDate(this.nowYear));
    }

    newDate(year, date = 1) {
        let n = new Date();
        n.setDate(date);
        n.setYear(year);
        return n;
    }

    load(date) {
        let tbody = document.createElement('tbody');
        tbody.classList.add("trNm");
        this.month();
    }

    month() {
        this.el.innerHTML = "";
        this.monthArr.forEach((x) => {
            let div = document.createElement("div");
            div.classList.add("calendar_content");
            div.innerHTML = `
                <div class="calendar_title">
                    <h1>${x}</h1>
                </div>
                <div class="cal" data-id="${x}">
                </div>
            `;
            this.day(div, x);
            this.el.appendChild(div);
        });
    }
    
    day(div, data) {
        this.datas.forEach((x) => {
            let d = x.showDate.split("-");
            if(d[1] == data) {
                let cal = document.createElement("div");
                cal.classList.add("calendar_cons");
                let d1 = this.getToday().split("-");
                let d2 = x.showDate.split("-");
                let day = "";
                if(d1[1] == d2[1]) {
                    day = d2[2] - d1[2];
                    cal.innerHTML = `
                        <a href="/year/update/${x.showUid}">${d[1]}. ${d[2]} ${x.showName}(d-${day}일)</a>
                    `;
                    if(day == 0) {
                        cal.innerHTML = `
                            <a href="/year/update/${x.showUid}">${x.showName}(D-day)</a>
                        `;
                    } else if(day > 0) {
                        cal.innerHTML = `
                            <a href="/year/update/${x.showUid}">${x.showName}(d-${day}일)</a>
                        `;
                    } else if(day < 0) {
                        cal.innerHTML = `
                            <a href="/year/update/${x.showUid}">${x.showName}(d-${day}일)</a>
                        `;
                    }
                } else {
                    console.log(d1[0]);
                    console.log(d2[0]);
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
                                cal.innerHTML = `
                                <a href="/year/update/${x.showUid}">${x.showName}(${month}달)</a>
                                `;
                            } else if(total < 31) {
                                cal.innerHTML = `
                                <a href="/year/update/${x.showUid}">${x.showName}(${total}일)</a>
                                `;
                            } else {
                                cal.innerHTML = `
                                <a href="/year/update/${x.showUid}">${x.showName}(${month}달)</a>
                                `;
                            }
                        }
                    } else {
                        cal.innerHTML = `
                            <a href="/year/update/${x.showUid}">${x.showName}</a>
                        `;
                    }
                }
                div.querySelector(".cal").appendChild(cal);
            }
        });
    }

    getToday(){
        let date = new Date();
        let year = date.getFullYear();
        let month = ("0" + (1 + date.getMonth())).slice(-2);
        let day = ("0" + date.getDate()).slice(-2);
    
        return year + "-" + month + "-" + day;
    }

    // 다음 년도 가져오기
    next = e => {
        location.href = `/year/${++this.years}`;
    }
    // 이전 년도 가져오기
    prev = e => {
        location.href = `/year/${--this.years}`;
    }

    popup() {
        $(".calendar_con").fadeIn();
    }

    template() {
        let div = document.createElement("div");
        div.classList.add("p-3");
        div.innerHTML = `
            <div class="flex-between" style="position:relative;">
                <div class="flex-center font-weight-bold mb-4">
                    <button class="leftBtn prev">이전년</button>
                    <div class="fs-3 mx-4 d-flex"><span class="year">${this.years}</span>년</div>
                    <button class="rightBtn next">다음년</button>
                </div>
                <div class="dlfwjd_btn" style="position:absolute;right:0;top:0;">
                    <button class="dlfwjd_add">일정 등록</button>
                </div>
            </div>
        `;
        div.querySelector('.dlfwjd_add').addEventListener('click', this.popup);
        div.querySelector('.prev').addEventListener('click', this.prev);
        div.querySelector('.next').addEventListener('click', this.next);

        this.top.appendChild(div);
    }
}