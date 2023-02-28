<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delicious Snack – Always keep you warm</title>
    <meta name="author" content="Arrting" />
    <meta
        name="description"
        content="每一個甜點都是我們的匠心之作，我們相信您可以品嚐到每一個細節的味道,無論您是在享受自己的時光，還是和朋友共度美好時光，我們的甜點總能讓您感受到甜蜜和溫暖。"
    />
    <meta name="robots" content="index,follow" />
    <!--google font字體-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap"
        rel="stylesheet"
    />
    <!--title icon-->
    <link rel="shortcut icon" href="./Icons/logo_icon_128.png" />
    <link rel="bookmark" href="./Icons/logo_icon_128.png" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="./style/style.css" />
</head>
<body>
<!--header-->
<header>
    <div class="logo">
        <img src="./Icons/logo_icon_128.png" alt="logo" />
        <h1>Delicious Snack</h1>
    </div>

    <nav>
        <ul>
            <li><a href="./index.html">首頁</a></li>
            <li><a href="#">關於我們</a></li>
            <li><a href="#">會員登入</a></li>
            <li><a href="#">聯絡我們</a></li>
        </ul>
    </nav>
</header>

<main class="menu">
    <section class="list">
        <button class="reset" title="重置菜單">
            <i class="fa-solid fa-rotate-right"></i>
        </button>
        <h2>菜單列表</h2>
        <ul>
            <!-- <li>草莓奶酥</li>
            <li>肉桂捲</li>
            <li>起司蛋糕</li>
            <li>巧克力餅乾</li>
            <li>香菇鹹派</li> -->
        </ul>
        <a href="./addRecipe.html" class="add" title="新增菜單"
        ><i class="fa-solid fa-plus"></i
            ></a>
    </section>

    <section class="menu">
        <!-- 品名 -->
        <div class="snackName">
            <h2>品名:</h2>
        </div>
        <!-- 食材 -->
        <div class="ingredients">
            <h2>食材:</h2>
        </div>
        <!-- 做法 -->
        <div class="method">
            <h2>做法:</h2>
        </div>
    </section>
</main>

<footer class="menu" id="menu">
    <div class="logo">
        <img src="./Icons/logo_icon_128.png" alt="logo" />
        <h1>Delicious Snack</h1>
    </div>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Contant</a></li>
        </ul>
    </nav>
    <section class="links">
        <a href="#"><img src="./Icons/facebook.svg" alt="facebook" /></a>
        <a href="#"><img src="./Icons/instagram.svg" alt="instagram" /></a>
        <a href="#"><img src="./Icons/twitter.svg" alt="twitter" /></a>
        <a href="#"><img src="./Icons/youtube.svg" alt="youtube" /></a>
    </section>
</footer>
</body>
<script>
    let header = document.querySelector("header");
    let headerH1 = document.querySelector("header h1");
    let headerAnchor = document.querySelectorAll("header nav ul li a");
    let addList = document.querySelector("main section ul");

    let snackName = document.querySelector("section.menu div.snackName");
    let ingredients = document.querySelector("section.menu div.ingredients");
    let method = document.querySelector("section.menu div.method");

    let page = document.querySelector("main");
    //console.log(page.classList[0]);

    //console.log(header);

    window.addEventListener("scroll",() => {
        if(window.pageYOffset != 0){
            header.style.backgroundColor = "rgba(90, 50, 30, 0.8)";
            headerH1.style.color = "#DECDB7";
            headerAnchor.forEach(a =>{
                a.style.color = "#DECDB7";
            })
        }else{
            header.style = "";
            headerH1.style = "";
            headerAnchor.forEach(a =>{
                a.style.color = "";
            });
        }

        //console.log(window.pageYOffset);
        //console.log(typeof header.style.backgroundColor);
    })

    if(page.classList[0] == 'menu'){
        loadData();

        //重置菜單
        let reset = document.querySelector("main.menu section button");
        //console.log(reset);
        reset.addEventListener("click", ()=>{
            localStorage.removeItem("menus");
            //console.log("reset");
            window.location.reload();
            //loadData();
        })
    }
    // loadData();
    //loadData();
    //點擊更換菜單
    let snackLi = document.querySelectorAll("main.menu section.list ul li");

    snackLi.forEach((e,index) => {
        //console.log(index);
        let myMenusArray = JSON.parse(localStorage.getItem("menus"));
        snackLi[index].addEventListener("click",()=>{
            //console.log(index);
            let p1 = document.querySelector("main.menu section div.snackName p");
            p1.innerText = myMenusArray[index].snackName;
            let p2 = document.querySelector("main.menu section div.ingredients p");
            p2.innerText = myMenusArray[index].ingredients;
            let p3 = document.querySelector("main.menu section div.method p");
            p3.innerText = myMenusArray[index].method;
            //console.log(p1.innerText);
            console.log("更換菜單");
        })
    })




    //console.log(typeof addList);
    //console.log(typeof document);

    function loadData(){

        let myMenus = localStorage.getItem("menus");
        //console.log(myMenus);
        //console.log(typeof myMenus);

        if(myMenus == null){
            let menus = [
                {
                    snackName:"草莓奶酥",
                    ingredients:"1杯全用途麵粉、1/4 杯糖、1/2 杯無鹽奶油、切成小塊、1/4 杯冰水、1/2 杯草莓果醬、1/2 杯奶油芝士、1/4 杯砂糖、1 個大雞蛋、1 茶匙香草精",
                    method:"在一個大碗中，混合麵粉和糖。加入切成小塊的奶油，用手指揉成粗麵粉狀。加入冰水，揉成光滑的麵糰。把麵糰包裹在保鮮膜中，冷藏 30 分鐘。預熱烤箱至 375°F（190°C）。在一個小碗中，混合草莓果醬和奶油芝士，攪拌均勻。在另一個小碗中，打蛋和砂糖，攪拌均勻。加入香草精。從冰箱中取出麵糰，將其擀平成一個圓形的餅皮，然後放在一個烤盤上。把草莓和奶油芝士混合物倒入餅皮上，抹平。然後把蛋液倒在草莓和奶油芝士混合物上。把烤盤放進烤箱裡，烤 35 分鐘，或者直到草莓奶酥變成金黃色。從烤箱中取出草莓奶酥，放涼幾分鐘後即可享用。"
                },
                {
                    snackName:"肉桂捲",
                    ingredients:"2杯麵粉,1/4茶匙發酵粉,1/4杯糖,1/4杯無鹽奶油，融化,3/4杯牛奶,1/2茶匙肉桂粉",
                    method:"預熱烤箱至375°F（190°C）。在大碗中混合麵糰的麵粉、發酵粉、糖和鹽。在桌面上灑些麵粉，將麵糰倒在上面。用手輕輕揉搓，直到麵糰光滑且不粘手。將麵糰擀成長方形。在其表面均勻地塗上肉桂餡。捲起麵糰，使其呈長形。用刀將麵糰切成12小段。把烤盤放入烤箱中烘烤25-30分鐘，或直到肉桂捲變成金黃色。"

                },
                {
                    snackName:"南瓜鹹派",
                    ingredients:"鹹派皮:70 克 奶油 (冷藏)，切小丁，多備一些刷油用,140 克 低筋麵粉 ，多備一些撒粉用,1 顆 蛋,1 小撮 鹽,35 克 冰水",
                    method:"將蛋、蒸熟的南瓜、牛奶、鮮奶油和帕瑪森起士粉放入主鍋，以30 秒/速度3混合。 將餡料、烤好的培根和蕃茄片均勻鋪在派皮內，倒入混合好的蛋液，均勻灑上比薩起士絲，放入烤箱以180°C烤25-30分鐘或表面呈金黃色，取出放涼後切塊享用。"

                } ,
                {
                    snackName:"巧克力餅乾",
                    ingredients:"無鹽奶油 150g,低筋麵粉 275g,可可粉 25g,蛋 1顆,細砂糖 100g,泡打粉(可省) 1/2小匙",
                    method:"將無鹽奶油打散(也可放置室溫後再操作更容易)，細砂糖加入1/3。 糖拌勻後加入一顆全蛋。 將可可粉、低筋麵粉和泡打粉混合均勻並篩入，用刮刀拌成糰即可。將麵糰整型成長方體，包上保鮮膜，冷凍25分鐘變硬定型。切約0.4cm厚，整齊排入小烤箱烤盤。放入小烤箱烤約8分鐘(約5分鐘表面有點上色後蓋鋁箔紙)"

                } ,
                {
                    snackName:"香菇鹹派",
                    ingredients:"鹹派皮:70 克 奶油 (冷藏)，切小丁，多備一些刷油用,140 克 低筋麵粉 ，多備一些撒粉用,1 顆 蛋,1 小撮 鹽,35 克 冰水",
                    method:"將蛋、蒸熟的香菇、牛奶、鮮奶油和帕瑪森起士粉放入主鍋，以30 秒/速度3混合。 將餡料、烤好的培根和蕃茄片均勻鋪在派皮內，倒入混合好的蛋液，均勻灑上比薩起士絲，放入烤箱以180°C烤25-30分鐘或表面呈金黃色，取出放涼後切塊享用。"

                }
            ];
            localStorage.setItem("menus",JSON.stringify(menus));
        }
        let myMenusArray = JSON.parse(localStorage.getItem("menus"));
        //console.log(myMenusArray);

        //左邊菜單列表讀取
        myMenusArray.forEach(element => {
            //console.log(element.snackName);
            // create a list
            let name = element.snackName;
            let li = document.createElement("li");
            li.innerText = name;
            addList.appendChild(li);
        });

        //顯示食譜內容
        let p1 = document.createElement("p");
        let p2 = document.createElement("p");
        let p3 = document.createElement("p");
        p1.innerText = myMenusArray[0].snackName;
        snackName.appendChild(p1);
        p2.innerText = myMenusArray[0].ingredients;
        ingredients.appendChild(p2);
        p3.innerText = myMenusArray[0].method;
        method.appendChild(p3);

    }


    // let myMenu = [
    //     {
    //         snackName:"草莓奶酥",
    //         ingredients:"1杯全用途麵粉、1/4 杯糖、1/2 杯無鹽奶油、切成小塊、1/4 杯冰水、1/2 杯草莓果醬、1/2 杯奶油芝士、1/4 杯砂糖、1 個大雞蛋、1 茶匙香草精",
    //         method:"在一個大碗中，混合麵粉和糖。加入切成小塊的奶油，用手指揉成粗麵粉狀。加入冰水，揉成光滑的麵糰。把麵糰包裹在保鮮膜中，冷藏 30 分鐘。預熱烤箱至 375°F（190°C）。在一個小碗中，混合草莓果醬和奶油芝士，攪拌均勻。在另一個小碗中，打蛋和砂糖，攪拌均勻。加入香草精。從冰箱中取出麵糰，將其擀平成一個圓形的餅皮，然後放在一個烤盤上。把草莓和奶油芝士混合物倒入餅皮上，抹平。然後把蛋液倒在草莓和奶油芝士混合物上。把烤盤放進烤箱裡，烤 35 分鐘，或者直到草莓奶酥變成金黃色。從烤箱中取出草莓奶酥，放涼幾分鐘後即可享用。"
    //     },
    //     {
    //         snackName:"肉桂捲",
    //         ingredients:"2杯麵粉,1/4茶匙發酵粉,1/4杯糖,1/4杯無鹽奶油，融化,3/4杯牛奶,1/2茶匙肉桂粉",
    //         method:"預熱烤箱至375°F（190°C）。在大碗中混合麵糰的麵粉、發酵粉、糖和鹽。在桌面上灑些麵粉，將麵糰倒在上面。用手輕輕揉搓，直到麵糰光滑且不粘手。將麵糰擀成長方形。在其表面均勻地塗上肉桂餡。捲起麵糰，使其呈長形。用刀將麵糰切成12小段。把烤盤放入烤箱中烘烤25-30分鐘，或直到肉桂捲變成金黃色。"

    //     },
    //     {
    //         snackName:"肉桂捲",
    //         ingredients:"2杯麵粉,1/4茶匙發酵粉,1/4杯糖,1/4杯無鹽奶油，融化,3/4杯牛奶,1/2茶匙肉桂粉",
    //         method:"預熱烤箱至375°F（190°C）。在大碗中混合麵糰的麵粉、發酵粉、糖和鹽。在桌面上灑些麵粉，將麵糰倒在上面。用手輕輕揉搓，直到麵糰光滑且不粘手。將麵糰擀成長方形。在其表面均勻地塗上肉桂餡。捲起麵糰，使其呈長形。用刀將麵糰切成12小段。把烤盤放入烤箱中烘烤25-30分鐘，或直到肉桂捲變成金黃色。"

    //     }

    // ];

    // window.addEventListener("click",() =>{
    //     //localStorage.setItem("menus",JSON.stringify(myMenu));
    //     // let myMenuArray = JSON.parse(localStorage.getItem("list"));
    //     //console.log(localStorage.getItem("list"));
    //     // myMenuArray.push(" ");
    //     //localStorage.setItem("menus",JSON.stringify(myMenuArray))
    //     localStorage.removeItem("menus");
    // })


    //console.log(add);
    // function loadData(){
    //     let myMenus = localStorage.getItem("menus");
    //     let myMenusArray = JSON.parse(myMenus);
    //     //console.log(myMenusArray);

    // }
    //let menuTag = document.

</script>

<!-- <li><a href="#">首頁</a></li>
<li><a href="./aboutUs">關於我們</a></li>
<li><a href="./login">會員登入</a></li>
<li><a href="./findUs">聯絡我們</a></li> -->
