class App {
    constructor(data) {
        this.data = data;
        this.datas = [];
        this.init();
        this.none = 0;
        this.listEl = document.querySelector(".angud_content");
        this.tableListEl = document.querySelector(".angud_table_content");
        this.pageNone = document.querySelector(".angud_none_content");
        this.pageination = document.querySelector(".paginations");
        this.arr = ['전통 공연·예술','전통기술','전통지식','구전 전통 및 표현','전통 생활관습','의례·의식','전통 놀이·무예','전체 현황'];
    }
    
    init() {
        this.datas = this.data;
        setTimeout(function() {
            document.getElementById('album').click();
        }, 100);
        this.listPage = new Pagination(this, ".angud_content", 8);
        this.tablePage = new Pagination(this, ".angud_table > tbody", 10);
        this.addEvent();
    }

    addEvent() {
        document.querySelector("#album").addEventListener("click", this.showList.bind(this));
        document.querySelector("#list").addEventListener("click", this.showTableList.bind(this));
        document.querySelector(".angud_add_btn > button").addEventListener("click", this.showAngudPopup.bind(this));
    }

    showList() {
        document.querySelector("#album").classList.add("active");
        document.querySelector("#list").classList.remove("active");
        this.listEl.classList.remove("none");
        this.pageination.classList.remove("none");
        this.tableListEl.classList.add("none");
        if(this.datas != "") {
            this.pageNone.classList.add("none");
        } else { 
            this.listEl.classList.add("none");
            this.pageination.classList.add("none");
            this.pageNone.classList.remove("none");
        }
        this.type = "list";
        this.listPage.viewList(this.datas, this.angud_template, this.type);
    }

    showTableList() {
        document.querySelector("#album").classList.remove("active");
        document.querySelector("#list").classList.add("active");
        this.listEl.classList.add("none");
        this.pageination.classList.remove("none");
        this.tableListEl.classList.remove("none");
        if(this.datas != "") {
            this.pageNone.classList.add("none");
        } else {
            this.tableListEl.classList.add("none");
            this.pageination.classList.add("none");
            this.pageNone.classList.remove("none");
        }
        this.type = "table";
        this.tablePage.viewList(this.datas, this.angud_table_template, this.type);
    }

    showAngudPopup() {
        $(".angud_popup_bg").fadeIn();
        $(".popup_close").on("click", () => {
            $(".angud_popup_bg").fadeOut();
        });
    }

    angud_template(x) {
        let div = document.createElement("div");
        div.classList.add("content_item");
        div.dataset.title = x.bcodeName;
        if(x.image !== "") {
            div.innerHTML = `
                <a class="content_img" href="/sub1/update/${x.idx}">
                    <img src="/getImage/${x.image}" alt="alt" title="${x.image}">
                </a>
                <a class="content_title" href="/sub1/update/${x.idx}">${x.ccbaMnm1}</a>
            `;
        } else {
            div.innerHTML = `
                <a href="/sub1/update/${x.idx}" class="content_img">
                    <div>no image</div>
                </a>
                <a class="content_title" href="/sub1/update/${x.idx}">${x.ccbaMnm1}</a>
            `;
        }
        return div;
    }

    angud_table_template(x) {
        const tr = document.createElement("tr");

        tr.innerHTML = `
            <td>${x.idx}</td>
            <td class="ansghkwo_title"><a href="/sub1/update/${x.idx}">${x.ccbaMnm1}</a></td>
            <td>${x.ccmaName}</td>
            <td>${x.crltsnoNm}호</td>
            <td>${x.ccbaLcad}</td>
        `;
        return tr;
    }
}