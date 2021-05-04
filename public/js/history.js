const local = window.localStorage;
class History {
    constructor() {
        this.datas;
        document.querySelector(".dusgur_year").innerHTML = "";
        document.querySelector(".dusgur_now_year").innerHTML = "";
        document.querySelector(".dusgur_context").innerHTML = "";
        this.addEvent();
        this.init();
    }

    async init() {
        await this.readData();
    }

    readData(){
        return new Promise((res,rej)=>{
            if(local.datas){
                let json = JSON.parse( local.datas );
                this.datas = json.datas;
                res();
                console.log(local.datas);
            }
        });  
     }

    addEvent() {
        $(".dusgur_btn > button").on("click", () => {
            $(".dusgur_modal_bg").fadeIn();
        });
        $(".close").on("click", () => {
            $(".dusgur_modal_bg").fadeOut();
        });
        $(".add").on("click", () => {
            let data = {content:$("#content").val(), date: $("#date").val()};
            this.datas = data;
            this.addLoc();
            $(".dusgur_modal_bg").fadeOut();
        });
    }

    addLoc() {
        let obj = {};
        obj.datas = this.datas;

        let json = JSON.stringify(obj, null , 0);
        local.datas = json;
        console.log("저장성공");
    }

    add() {
        let div = document.createElement("div");
        div.classList.add("wrap_con");
        div.innerHTML = `
            <p>${$("#content").val()}</p>
            <div class="wrap_btn">
                <button>수정</button>
                <button>삭제</button>
            </div>
        `;
        document.querySelector(".dusgur_context").appendChild(div);
    }
}

window.addEventListener("load", () => {
    let history = new History();
});