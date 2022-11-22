//PWA化→スマホでも使えるようにする奴
//web speech apiがスマホに対応していないので今回は使わない
/*
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('service_worker.js')
        .then((registration) => {
        console.log(`[Main] ServiceWorker registration finished. Scope:${registration.scope}`);
        })
        .catch((reason) => {
        console.log(`[Main] ServiceWorker registratio failed. Reason:${reason}`);
        });
    });
}
*/

// 音声認識
// 参考: https://jellyware.jp/kurage/iot/webspeechapi.html
var flag_speech = 0;
var recognition;
var lang = 'ja-JP';
var last_finished = ''; // 最後に確定した部分。確定部分が瞬時に消えるのを防ぐためにここで定義。
var textUpdateTimeoutID = 0;
var textUpdateTimeoutSecond = 30; // 音声認識結果が更新されない場合にクリアするまでの秒数（0以下の場合は自動クリアしない）


function vr_function() {
window.SpeechRecognition = window.SpeechRecognition || webkitSpeechRecognition;
recognition = new webkitSpeechRecognition();
recognition.lang = lang;
recognition.interimResults = true;
recognition.continuous = true;


//ステータス
recognition.onsoundstart = function() {
    document.getElementById('status').innerHTML = "認識中...";
    document.getElementById('status').className = "processing";
};
recognition.onnomatch = function() {
    document.getElementById('status').innerHTML = "音声を認識できませんでした";
    document.getElementById('status').className = "error";
};
recognition.onerror = function() {
    document.getElementById('status').innerHTML = "エラー";
    document.getElementById('status').className = "error";
    if (flag_speech == 0)
    vr_function();
};
recognition.onsoundend = function() {
    document.getElementById('status').innerHTML = "停止中";
    document.getElementById('status').className = "error";
    vr_function();
};

//認識した言葉をつなげる
recognition.onresult = function(event) {
    var results = event.results;
    var current_transcripts = ''; // resultsが複数ある場合は全て連結する。
    var need_reset = false;

    for (var i = event.resultIndex; i < results.length; i++) {
        //認識言語が日本語なら文末に「。」をつける。
        if (results[i].isFinal) {
            last_finished = results[i][0].transcript;
                if (lang == 'ja-JP') {
                last_finished += '。';
                }

            var result_log = last_finished

            //時刻の記録
            if (document.getElementById('checkbox_timestamp').checked) {
            var now = new window.Date();
            var Year = now.getFullYear();
            var Month = (("0" + (now.getMonth() + 1)).slice(-2));
            var Date = ("0" + now.getDate()).slice(-2);
            var Hour = ("0" + now.getHours()).slice(-2);
            var Min = ("0" + now.getMinutes()).slice(-2);
            var Sec = ("0" + now.getSeconds()).slice(-2);

            var timestamp = Year + '-' + Month + '-' + Date + ' ' + Hour + ':' + Min + ':' + Sec + '&#009;'
            result_log = timestamp + result_log
            }

            //文末で改行
            document.getElementById('result_log').insertAdjacentHTML('beforeend', result_log + '\n');
            textAreaHeightSet(document.getElementById('result_log'));
            need_reset = true;
            setTimeoutForClearText();
            flag_speech = 0;
        } else {
            current_transcripts += results[i][0].transcript;
            clearTimeoutForClearText();
            flag_speech = 1;
        }
    }

    //リアルタイム認識
    if (document.getElementById('checkbox_realtime').checked) {
        document.getElementById('result_text').innerHTML 
            = [last_finished, current_transcripts].join('<br>');
    }
    setTimeoutForClearText();
        if (need_reset) { vr_function(); }
    }

    //ステータス
    flag_speech = 0;
    document.getElementById('status').innerHTML = "待機中";
    document.getElementById('status').className = "ready";
    recognition.start();
}

function updateTextClearSecond() {
    const sec = Number(document.getElementById('select_autoclear_text').value);
        if ((!isNaN(sec)) && isFinite(sec) && (sec >= 0)) {
            textUpdateTimeoutSecond = sec;
        }
}

function clearTimeoutForClearText() {
    if (textUpdateTimeoutID !== 0) {
        clearTimeout(textUpdateTimeoutID);
        textUpdateTimeoutID = 0;
    }
}


// 変数 textUpdateTimeoutSecond に基づいてタイマーを設定する。
// タイマーの時間切れで、字幕を自動的に消去する。
// 変数の値がゼロ以下の場合はタイマーは設定されない。
// タイマーが既に動いている場合、処理タイミングは後からのもので上書きする。
function setTimeoutForClearText() {
if (textUpdateTimeoutSecond <= 0) return;

clearTimeoutForClearText();
textUpdateTimeoutID = setTimeout(
    () => {
    document.getElementById('result_text').innerHTML = "";
    last_finished = ''; // 前回の確定結果もクリアする。
    textUpdateTimeoutID = 0;
    },
    textUpdateTimeoutSecond * 1000);
}

// 手動で文章を区切る→たまに動かない
document.addEventListener('keydown',
event => {
    if (event.key === 'Enter') {
        if (flag_speech == 1) {
            recognition.stop();
        }
    }
});

/*
document.addEventListener('keydown',
event => {
    if(event.key === ''){
        
    }
});
*/

// 認識結果のログをダウンロードする
// 参考: https://qiita.com/kerupani129/items/99fd7a768538fcd33420
function downloadLogFile() {
const a = document.createElement('a');
a.href = 'data:text/plain,' + encodeURIComponent(document.getElementById('result_log').value);

var now = new window.Date();
var Year = now.getFullYear();
var Month = (("0" + (now.getMonth() + 1)).slice(-2));
var Date = ("0" + now.getDate()).slice(-2);
var Hour = ("0" + now.getHours()).slice(-2);
var Min = ("0" + now.getMinutes()).slice(-2);
var Sec = ("0" + now.getSeconds()).slice(-2);

a.download = 'log_' + Year + Month + Date + '_' + Hour + Min + Sec + '.doc';

a.click();
}


//文字サイズ変更
let y = 100;
function larger(){
    y *= 1.2;
    document.getElementById('result_log').style.fontSize = y + '%';
}

function smaller(){
    y /= 1.2;
    document.getElementById('result_log').style.fontSize = y + '%';
}

// 言語切替
// 参考: https://www.google.com/intl/ja/chrome/demos/speech.html
/*
201~312まで言語一覧
var langs = [
    ['Japanese', ['ja-JP']],
    ['English', ['en-US', 'United States'],
        ['en-AU', 'Australia'],
        ['en-CA', 'Canada'],
        ['en-IN', 'India'],
        ['en-KE', 'Kenya'],
        ['en-TZ', 'Tanzania'],
        ['en-GH', 'Ghana'],
        ['en-NZ', 'New Zealand'],
        ['en-NG', 'Nigeria'],
        ['en-ZA', 'South Africa'],
        ['en-PH', 'Philippines'],
        ['en-GB', 'United Kingdom'],
    ],
    ['Afrikaans', ['af-ZA']],
    ['አማርኛ', ['am-ET']],
    ['Azərbaycanca', ['az-AZ']],
    ['বাংলা', ['bn-BD', 'বাংলাদেশ'],
        ['bn-IN', 'ভারত']
    ],
    ['Bahasa Indonesia', ['id-ID']],
    ['Bahasa Melayu', ['ms-MY']],
    ['Català', ['ca-ES']],
    ['Čeština', ['cs-CZ']],
    ['Dansk', ['da-DK']],
    ['Deutsch', ['de-DE']],
    ['Español', ['es-AR', 'Argentina'],
        ['es-BO', 'Bolivia'],
        ['es-CL', 'Chile'],
        ['es-CO', 'Colombia'],
        ['es-CR', 'Costa Rica'],
        ['es-EC', 'Ecuador'],
        ['es-SV', 'El Salvador'],
        ['es-ES', 'España'],
        ['es-US', 'Estados Unidos'],
        ['es-GT', 'Guatemala'],
        ['es-HN', 'Honduras'],
        ['es-MX', 'México'],
        ['es-NI', 'Nicaragua'],
        ['es-PA', 'Panamá'],
        ['es-PY', 'Paraguay'],
        ['es-PE', 'Perú'],
        ['es-PR', 'Puerto Rico'],
        ['es-DO', 'República Dominicana'],
        ['es-UY', 'Uruguay'],
        ['es-VE', 'Venezuela']
    ],
    ['Euskara', ['eu-ES']],
    ['Filipino', ['fil-PH']],
    ['Français', ['fr-FR']],
    ['Basa Jawa', ['jv-ID']],
    ['Galego', ['gl-ES']],
    ['ગુજરાતી', ['gu-IN']],
    ['Hrvatski', ['hr-HR']],
    ['IsiZulu', ['zu-ZA']],
    ['Íslenska', ['is-IS']],
    ['Italiano', ['it-IT', 'Italia'],
        ['it-CH', 'Svizzera']
    ],
    ['ಕನ್ನಡ', ['kn-IN']],
    ['ភាសាខ្មែរ', ['km-KH']],
    ['Latviešu', ['lv-LV']],
    ['Lietuvių', ['lt-LT']],
    ['മലയാളം', ['ml-IN']],
    ['मराठी', ['mr-IN']],
    ['Magyar', ['hu-HU']],
    ['ລາວ', ['lo-LA']],
    ['Nederlands', ['nl-NL']],
    ['नेपाली भाषा', ['ne-NP']],
    ['Norsk bokmål', ['nb-NO']],
    ['Polski', ['pl-PL']],
    ['Português', ['pt-BR', 'Brasil'],
        ['pt-PT', 'Portugal']
    ],
    ['Română', ['ro-RO']],
    ['සිංහල', ['si-LK']],
    ['Slovenščina', ['sl-SI']],
    ['Basa Sunda', ['su-ID']],
    ['Slovenčina', ['sk-SK']],
    ['Suomi', ['fi-FI']],
    ['Svenska', ['sv-SE']],
    ['Kiswahili', ['sw-TZ', 'Tanzania'],
        ['sw-KE', 'Kenya']
    ],
    ['ქართული', ['ka-GE']],
    ['Հայերեն', ['hy-AM']],
    ['தமிழ்', ['ta-IN', 'இந்தியா'],
        ['ta-SG', 'சிங்கப்பூர்'],
        ['ta-LK', 'இலங்கை'],
        ['ta-MY', 'மலேசியா']
    ],
    ['తెలుగు', ['te-IN']],
    ['Tiếng Việt', ['vi-VN']],
    ['Türkçe', ['tr-TR']],
    ['اُردُو', ['ur-PK', 'پاکستان'],
        ['ur-IN', 'بھارت']
    ],
    ['Ελληνικά', ['el-GR']],
    ['български', ['bg-BG']],
    ['Pусский', ['ru-RU']],
    ['Српски', ['sr-RS']],
    ['Українська', ['uk-UA']],
    ['한국어', ['ko-KR']],
    ['中文', ['cmn-Hans-CN', '普通话 (中国大陆)'],
        ['cmn-Hans-HK', '普通话 (香港)'],
        ['cmn-Hant-TW', '中文 (台灣)'],
        ['yue-Hant-HK', '粵語 (香港)']
    ],
    ['हिन्दी', ['hi-IN']],
    ['ภาษาไทย', ['th-TH']]
    ];
*/
//言語選択肢
var langs = [
    ['Japanese', ['ja-JP']],
    ['English', ['en-US', 'United States'],
        ['en-AU', 'Australia'],
        ['en-CA', 'Canada'],
        ['en-IN', 'India'],
        ['en-KE', 'Kenya'],
        ['en-TZ', 'Tanzania'],
        ['en-GH', 'Ghana'],
        ['en-NZ', 'New Zealand'],
        ['en-NG', 'Nigeria'],
        ['en-ZA', 'South Africa'],
        ['en-PH', 'Philippines'],
        ['en-GB', 'United Kingdom'],
    ],
    ['한국어', ['ko-KR']],
    ['中文', ['cmn-Hans-CN']]
];

for (var i = 0; i < langs.length; i++) {
    select_language.options[i] = new Option(langs[i][0], i);
}

// デフォルトの言語を設定
select_language.selectedIndex = 0;
updateCountry();
select_dialect.selectedIndex = 0;

function updateCountry() {
    for (var i = select_dialect.options.length - 1; i >= 0; i--) {
        select_dialect.remove(i);
    }
    var list = langs[select_language.selectedIndex];
    for (var i = 1; i < list.length; i++) {
        select_dialect.options.add(new Option(list[i][1], list[i][0]));
    }
    select_dialect.style.display = list[1].length == 1 ? 'none' : 'inline';
    updateLanguage()
}

function updateLanguage() {
var flag_recognition_stopped = 0;
    if (recognition) {
        recognition.stop();
        flag_recognition_stopped = 1;
    }
    lang = select_dialect.value;
    if (flag_recognition_stopped) {
        vr_function();
    }
}

//色変更
function dark(){
    if(document.getElementById){
        document.getElementById("result_log").style.color = "#FFFFFF";
        document.getElementById("result_text").style.color = "#FFFFFF";
        document.getElementById("status").style.color = "#FFFFFF";
        document.getElementById("lang").style.color = "#FFFFFF";
        document.getElementById("time").style.color = "#FFFFFF";
        document.getElementById("realtime").style.color = "#FFFFFF";
        document.getElementById("result_log").style.backgroundColor = "#202020";
        document.getElementById("result_text").style.backgroundColor = "#202020";
        document.getElementById("table").style.backgroundColor = "#202020";
        document.getElementById("status").style.backgroundColor = "#202020";
        document.getElementById("body").style.backgroundColor = "#202020";
    }
}

function reset(){
    if(document.getElementById){
        document.getElementById("result_log").style.color = "black";
        document.getElementById("result_text").style.color = "black";
        document.getElementById("lang").style.color = "black";
        document.getElementById("time").style.color = "black";
        document.getElementById("realtime").style.color = "black";
        document.getElementById("result_log").style.backgroundColor = "white";
        document.getElementById("result_text").style.backgroundColor = "white";
        document.getElementById("table").style.backgroundColor = "white";
        document.getElementById("status").style.backgroundColor = "white";
        document.getElementById("body").style.backgroundColor = "white";
    }
}

//ドラッグでコピー  400~最後まで
function getSelectionText(){
    var selectedText = "";
    if(window.getSelection){
        selectedText = window.getSelection().toString()
    }
    return selectedText
}

function copySelectionText(elem){
    var copysuccess
    try{
        copysuccess = navigator.clipboard.writeText(elem)
    }catch(elem){
        copysuccess = false
    }
    return copysuccess
}

document.body.addEventListener('mouseup',function(){
    var selected = getSelectionText()
    if(selected.length > 0){
        var copysuccess = copySelectionText(selected)
    }
},false)