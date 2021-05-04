class Phone {
    constructor() {
        this.list = [];
        this.arr = [];
        this.data();
        this.clickEvent();
    }

    data() {
        fetch("restAPI/phone.php").then(data => data.json()).catch(err => {
            console.log("에러발생");
            console.log(err);
        }).then(d => {
            this.list = d.items;
            $(".label_list").empty();
            d.items.forEach((items) => {
                let d = items.deptNm;
                if (!this.arr.includes(d)) this.arr.push(d);
            });
            this.phoneList(d.items);
            if (d.statusCd !== "200") {
                alert(`${d.statusMsg}`);
                location.href = "index.html";
            }
        });
    }

    phoneList() {
        this.list.forEach(e => {
            let list = $(`.phone_item[data-id='${e.deptNm}']`);
            $(list).css({
                display: "block"
            });
            let div = document.createElement("div");
            div.classList.add("label_item");
            div.innerHTML = `
            <div class="name">${e.name}</div>
            <div class="num">${e.telNo}</div>
            `;
            $(`.phone_item[data-id='${e.deptNm}'] .label_list`).append(div);
        });
    }

    clickEvent() {
        let menu = $(".phone_menu div");
        menu.on("click", (e) => {
            console.log(e);
            $(".on").removeClass("on");
            e.target.classList.add("on");
            if ($(e.target).data("id") == "전체") {
                $(`.phone_item`).css({
                    display: "none"
                });
                this.phoneList();
            } else {
                $(`.phone_item`).css({
                    display: "none"
                });
                let list = $(`.phone_item[data-id='${$(e.target).data("id")}']`);
                $(list).css({
                    display: "block"
                });
            }
        });
    }
}

window.addEventListener("load", () => {
    let phone = new Phone();
});