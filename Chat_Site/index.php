<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>실시간 차트 - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../Stocks/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-firestore.js"></script>
    <script async src="//client.uchat.io/uchat.js"></script>
    <style>
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
    <script type="module">

        const firebaseConfig = {
        apiKey: "AIzaSyAule2yOMK_5sGSl-3cboqkTpP4rs6fCEI",
        authDomain: "dongchart-4c6e 5.firebaseapp.com",
        projectId: "dongchart-4c6e5",
        storageBucket: "dongchart-4c6e5.appspot.com",
        messagingSenderId: "944290931537",
        appId: "1:944290931537:web:f9df4a7683e88a102ce970",
        measurementId: "G-LTKY2FRXGQ"
        };
        if(!firebase.apps.length){
            firebase.initializeApp(firebaseConfig);
        } else {
            firebase.app();
        }

        const authService = firebase.auth();
        const dbService = firebase.firestore();
        let ref = dbService.collection('Dong_Chart');
        ref.doc('Line').get().then(async (snap)=>{
                var ctx = document.getElementById("Dong_Chart");
                var myLineChart = new Chart(ctx, snap.data());
                function update (){
                    myLineChart.update();
                }   
                setInterval(update, 1000);
        });
        </script>
</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="../index.html">종오증권</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="../copy.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-align-justify"></i></div>
                                종목
                            </a>
                            <a class="nav-link" href="../Chat_Site/index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                                채팅
                            </a>
                            <a class="nav-link collapsed" href="../News/index.html" >
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                신문
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <div class="wrapper">
                    <div class="content"><?php
                        if(!function_exists('uchat_array2data')) {
                            function uchat_array2data($arr) {
                                $arr['time'] = time();
                                ksort($arr);
                                $arr = array_filter($arr);
                                $arr['hash'] = md5(implode($arr['token'], $arr));
                                unset($arr['token']);
                                foreach ($arr as $k => &$v){ $v = $k.' '.urlencode($v); }
                                return implode("|", $arr);
                            }
                        }
                        $joinData = array();
                        $joinData['room'] = 'sdjafl';
                        $joinData['token'] = 'd884216462365855c1f61d1cb467bbb5'; //!!!!!!!!!!!!!!!!절대 유출 금지!!!!!!!!!!!!!!
                        $joinData['nick'] = $닉네임변수;
                        $joinData['id'] = $아이디변수;
                        $joinData['level'] = $레벨변수;
                        $joinData['auth'] = ''; // (admin, subadmin, member, guest)중 하나선택, 미선택시 자동(권장)
                        $joinData['icons'] = $아이콘주소변수;
                        ?>
                        <script async src="//client.uchat.io/uchat.js"></script>
                        <u-chat room='<?php echo $joinData['room'];?>' user_data='<?php echo uchat_array2data($joinData); ?>' style="display:inline-block; width:800px; height:600px;"></u-chat></div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
