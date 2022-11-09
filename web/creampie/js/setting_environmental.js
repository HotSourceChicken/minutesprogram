// function count(){
//     var thisCount = $("#count").html();
//         thisCount = Number(thisCount);  //文字列を数時に変換
//         thisCount = thisCount ++;
//     $("#count").html(thisCount);
//   }


// main.js
 
let counter, btnAdd;
let n;
let maxNum = 30; //登録できる最大人数:30人
 
function addCount(){
    if(n < maxNum){
        n++;
        counter.innerHTML = n;
    }
}

function downCount(){
    if(n > 1){
        n--;
        counter.innerHTML = n;
    }
}

window.addEventListener("load", ()=>{
    // 起動時の処理
    counter = document.getElementById("counter");
    btnAdd = document.getElementById("btnAdd");
    n = 1;
 
    btnAdd.addEventListener("click", addCount);
});

window.addEventListener("load", ()=>{
    // 起動時の処理
    counter = document.getElementById("counter");
    btnDown = document.getElementById("btnDown");
    n = 1;
 
    btnDown.addEventListener("click", downCount);
});