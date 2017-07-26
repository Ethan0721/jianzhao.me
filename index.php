
<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Jian Zhao Website ShowCase">
    <meta name="author" content="Jian Zhao">
    <meta name="keywords" content="Jian Zhao, Music Zone, Website Showcase, Music Player ShowCase">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Music Zonnnnnne</title>


    <!-- Bootstrap Core CSS -->
<link href="https://fonts.googleapis.com/css?family=Bellefair|Dancing+Script" rel="stylesheet">

<link href="css/bootstrap.css" rel="stylesheet">
<script src="https://use.fontawesome.com/2c8b905cc8.js"></script>
    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
<style>

</style>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">LOGO</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->   
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#music">Music</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Words</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            <div class="navbar-btn navbar-right">
             <?php  if(!isset($_SESSION['alive']) || $_SESSION['alive']==="NO") : ?>
                <form id = "register" action = "register.php" method = "get">   
                    <button class="btn btn-primary" name = "mode" >Register</button>&emsp;&emsp;
                </form>
                <form id = "login" action = "login.php" method = "get">
                    <button class="btn btn-warning" name = "mode"> Log in </button> 
                </form>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['alive']) && $_SESSION['alive']==="YES" ) :  ?>
                     <form id = "logout" action = "logout.php" method = "get">
                    <button class="btn btn-warning" name = "logout" >Log out </button>
                    </form>
                <?php endif; ?>
                <?php 
                if (isset($_GET['logout']))
                        {
                            header('Location: logout.php');
                        }
                ?>
                    
            </div>
        </div>

        </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
               <div id = "container-fluid">
                  <div class = "row ">
                        <video class = "col-xs-12 col-sm-12 col-md-12 col-lg-12" id = "video-bg-elem" preload="auto" autoplay="true" loop="true" muted="muted">
                          <source src="video/video.mp4" type="video/mp4">Video not supported
                          <source src="video/video.webm" type="video/webm">
                          <source src="video/video.ogg" type="video/ogg">
                        </video> 
                        <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 content">
                            <?php
                                if(isset($_SESSION['username'] ) && $_SESSION['username'] != "" ){
                                    echo "<h1>".$_SESSION['message']."</h1>";
                                } else{
                                    echo "<h1>Hi There!</h1>";
                                }
                            ?>
                           <p>This is a showcase website belongs to Jian Zhao</p>
                            <a id = "go-to-music" class=" fa fa-angle-double-down fa-3x page-scroll" href="#music"></a>
                        </div>
                        </div>
                </div>
 </section>

<!-- Music Section -->
<section id="music" class="music-section  radial-gradient">
    <h1><strong>Music Zone</strong><sub> - Just Listen</sub></h1>
    
    <!-- music zone containter -->
    <div class ="container-fluid ">
        <div class="row">
             <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"> 
                    <input type="text" class="glyphicon glyphicon-search" placeholder="not supported yet">
            </div> 
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9"> 
             </div>
             <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                 <div class = "row bg" >
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 "><img class = "bg-icon" onclick = "change_color1();" src="bg/bg1.png"  alt="" ></div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 "><img class = "bg-icon" onclick = "change_color2();" src="bg/bg2.png"  alt="" ></div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 "><img class = "bg-icon" onclick = "change_color3();" src="bg/bg3.png"  alt="bg" ></div>
                 </div>
             </div>
        </div>
        <!--left side menue bar -->
        <div class="row">
            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 two-sides"></div>
            <div class="col-xs-5 col-sm-5 col-md-4 col-lg-4 player-body">
                <div class = "player-head"> 
                    <img src = "albums/cover.jpg" alt = "cover" class = "img-fluid song-cover">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 player-list">
                 <table class="table table-hover">
                    <thead>
                      <tr>
                        <th></th>
                        <th>#</th>
                        <th>Song</th>
                        <th>Time</th>
                      </tr>
                    </thead>
                        <tbody id ="trackbox"> </tbody>
                  </table>
            </div>
         </div> 
        <div class="row space-row">
            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 space"></div>
            <div class="col-xs-5 col-sm-5 col-md-4 col-lg-4 space"></div>
             <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 space"></div>
            <div class="col-xs-1 col-md-1 col-md-1 col-lg-1 space"></div>
        </div> 
        <div class="row">
            <!--  three parts of control bar -->
            <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 control-bar">
        <!-- Left side -->
                <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 left-control-bar">
                    <div class="row">
                        <i class="col-xs-3 col-sm-3 col-md-3 col-lg-3 fa fa fa-backward fa-lg direction-arrow" onclick="backwardAudio();"></i>
                        <i class="col-xs-6 col-sm-6 col-md-6 col-lg-6 fa fa-play fa-2x" id = "playpausebtn" ></i>
                        <i class="col-xs-3 col-sm-3 col-md-3 col-lg-3 fa fa fa-forward fa-lg direction-arrow" onclick = "forwardAudio();"></i>
                    </div>
                </div>
        <!-- Middle side -->
                <div class = "col-xs-6 col-sm-6 col-md-6 col-lg-6 middle-control-bar">
                    <div  id = "song_name"></div>
                    <div class="timebox row">
                        <div  class = "col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                        <progress class = "col-xs-10 col-sm-10 col-md-10 col-lg-10" min = "0" value="0" max="100">dsad</progress>
                        <div  class = "col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>
                    <span   id="curtimetext">00:00 </span> /
                    <span   id="durtimetext">00:00</span>
                </div>
        <!-- Right side -->
                <div class = "col-xs-3 col-sm-3 col-md-3 col-lg-3 right-control-bar">
                    <div class = "row">
                        <i id = "mutebtn" class="fa fa-bell fa-lg" aria-hidden="true"></i>
                      <!--   <i id = "volumebtn" type = " range" min = "0" max = "100" value = "100" step = "1" class="fa fa-volume-up fa-lg" aria-hidden="true"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
 
<?php 
    require_once('./DatabaseAdaptor.php');
    $myDatabaseFunctions = new DatabaseAdaptor();
    $arrayOfMessage = $myDatabaseFunctions->getQuotesAsArray();
?>
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
<!--                 <div class="col-lg-11">
 -->                <h1>Leave Your Words</h1>
                    <div class = 'board'>
<!--                         <div class = "row">
 -->                      <div class  = "comments"> <strong>COMMENTS* <?= count($arrayOfMessage) ?></strong></div><br>
                            <form class="comments" action = "controller.php" method = "post">
                                 <textarea id = "message-board" name = "message-board" cols = "80" rows = "3" placeholder = "Please log in leave your words"></textarea>

                                <?php if(isset($_SESSION['username']) && $_SESSION['username'] != "") { 
                                    
                                echo "<input type = 'submit'  name = 'submit' value = 'comments'>"; } ?>    
                            </form>

                            <div class = "col-md-12">
                                <div class = "container-box">
                            <?php 
                            foreach ($arrayOfMessage as $message) { ?>
                                <div class = "message-box">  
                                    <div class = "username-box">&nbsp; <strong> <?= $message['username']." / ". $message['added']?> </strong>
                                    </div><br> <br>
                                    <div class = messages>
                                        <?= '"'.$message['message'].'"' ?>
                                    </div><br>
                                    
                                   
                                    <form action = "controller.php " method  = "post">
                                        <input type = "hidden" name = "ID" value = "<?= $message['id'] ?>"  > &nbsp;  &nbsp;
                                        <span class = "rating" > 
                                        <?php  
                                            echo $message['liked']; 
                                        ?>
                                        </span>
                                        <button class = "fa fa-thumbs-up" name = "action" value = "increase"></button>
                                        <button class = "fa fa-thumbs-down" name = "action" value = "decrease"></button>&nbsp;&nbsp;&nbsp;
                                        <span class = "rating" > 
                                        <?php  
                                            echo $message['disliked']; 
                                        ?>
                                        </span>
                               </form></br></br>
                                </div>
                                <?php 
                                    }  
                                ?></div><br>
     
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Section</h1>

                    本网站由赵健运行。赵健拥有和保留一切权利。所有音乐来自网络请支持正版音乐。
                    Contact information：ethan072158@gmail.com
                </div>
            </div>
        </div>
    </section>
<script>
var audio;
function _(id){
    return document.getElementById(id);
}

function change_color1()
{  

    var el = document.querySelector(".radial-gradient");
    el.style.backgroundImage = "radial-gradient(#79F1A4, #0E5CAD)";
}

function change_color2(){
      var el = document.querySelector(".radial-gradient");
    el.style.backgroundImage = "radial-gradient(#F1CA74, #A64DB6)";

}
function change_color3(){
      var el = document.querySelector(".radial-gradient");
        el.style.backgroundImage = "radial-gradient(#F97794, #623AA2)";


}
    function forwardAudio(){
            audio.currentTime += 30.0;
    }

    function backwardAudio(){
        audio.currentTime -= 30.0;
    }

// initAudio
function initAdudio(){
    var audio_folder,audio_ext,audio_index, is_playing, playingtrack="",trackbox,tracks;
    var playbtn, mutebtn, seekslider, curtimetext,durtimetext, agent, curmins, cursecs, durmins, dursecs, song_name, progressBar;
    var tr, pb, td_1, td_2,td_3;
    var nt;
     audio = new Audio();
     audio_folder = "songs/";
     audio_ext = ".mp3";
     audio_index = 1;
     is_playing = false;
     trackbox = _("trackbox");
     tracks = {
        "track1":["Is This Love ", "IsThisLove", "3:36"],
        "track2":["阳光照进回忆里", "阳光照进回忆里","5:21"],
        "track3":["Take Me Away ", "TakeMeAway","3:28"],
        "track4":["一万次悲伤", "一万次悲伤","4:15"],
        "track5":["Apple", "Apple","3:49"],
        "track6":["结婚", "结婚","5:26"],
        "track7":["夜空中最亮的星", "夜空中最亮的星","4:12"],
        "track8":["哪里是你的拥抱", "哪里是你的拥抱","6:55"],
        "track9":["Chemical Bus ", "ChemicalBus","4:10"],
        "track10":["再见 再见 ", "再见再见","5:29"]
    };

    // Set object references
    playbtn =  _("playpausebtn");
    mutebtn =  _("mutebtn");
    seekslider = _("seekslider");
    curtimetext = _("curtimetext");
    durtimetext = _("durtimetext");
    song_name = _("song_name");

    playbtn.addEventListener("click",playPause);
    mutebtn.addEventListener("click", mute);
    progressBar = document.querySelector("progress");
    progressBar.addEventListener("click", seek);
    audio.addEventListener("ended",function(){
        _(playingtrack).setAttribute("class", "fa fa-play");
        playingtrack = "";
        is_playing = false;
        playbtn.setAttribute("class", "col-xs-6 col-sm-6 col-md-6 col-lg-6 fa fa-play fa-2x");
        song_name.innerHTML = "";
    });

    for(var track in tracks){
         tr = document.createElement("tr");
         pb = document.createElement("i");
         td_1 = document.createElement("td");
         td_2 = document.createElement("td");
         td_3 = document.createElement("td");        
        pb.className = "fa fa-play";
        pb.style.marginTop="10px";
        pb.style.marginLeft="2px";
        td_1.innerHTML = audio_index;
        td_2.innerHTML= tracks[track][0];
        td_3.innerHTML = tracks[track][2];
        pb.id = tracks[track][1];
        pb.addEventListener("click", switchTrack);
        tr.appendChild(pb);
        tr.appendChild(td_1);
        tr.appendChild(td_2);
        tr.appendChild(td_3);
        trackbox.appendChild(tr);
        audio_index++;
    }
    audio.addEventListener("timeupdate", function(){ seektimeupdate(); });

    //////////// SwitchTrack triggered by pb which is playpause button in playlist ///////////
    function switchTrack(event){
        if(is_playing){
            if(playingtrack != event.target.id){
                is_playing = true;
                _(playingtrack).setAttribute("class", "fa fa-play ");
                event.target.setAttribute("class", "fa fa-pause ");
                playbtn.setAttribute("class", "col-xs-6 col-sm-6 col-md-6 col-lg-6 fa fa-pause fa-2x ");
                audio.src = audio_folder+event.target.id+audio_ext;
                audio.play();
            } else {
                audio.pause();
                is_playing = false;
                event.target.setAttribute("class", "fa fa-play ");
                playbtn.setAttribute("class", "col-xs-6 col-sm-6 col-md-6 col-lg-6 fa fa-play fa-2x");
            }
        } else {
                is_playing = true;
                event.target.setAttribute("class", "fa fa-pause ");
                playbtn.setAttribute("class", "col-xs-6 col-sm-6 col-md-6 col-lg-6 fa fa-pause fa-2x");

            if(playingtrack != event.target.id){
                audio.src = audio_folder+event.target.id+audio_ext;
            }
                audio.play();

        }
        playingtrack = event.target.id;

    }


    //////////// playPause trigger by playbtn ///////////
    function playPause(){
        if(audio.paused){
            if(_(playingtrack) !=null){

                audio.play();
                is_playing = true;
                playbtn.setAttribute("class", "col-xs-6 col-sm-6 col-md-6 col-lg-6 fa fa-pause fa-2x");
                _(playingtrack).setAttribute("class", "fa fa-pause ");
            }
        }
        else {
            audio.pause();
            is_playing = true;
            playbtn.setAttribute("class", "col-xs-6 col-sm-6 col-md-6 col-lg-6 fa fa-play fa-2x");
            _(playingtrack).setAttribute("class", "fa fa-play ");

        }
    }


    //////////// mute triggered by mutebtn ///////////
    function mute(){
        if(audio.muted){
            audio.muted = false;
            mutebtn.setAttribute("class", "fa fa-bell fa-lg fa-lg"); 
        } else {
            audio.muted = true;
            mutebtn.setAttribute("class", "fa fa-bell-slash fa-lg fa-lg"); 
        }
    }
    ////////////// seek Traggied by progressBar //////////
    function seek(event){
        var percent = event.offsetX / this.offsetWidth;
        progressBar.value = percent * 100;
        audio.currentTime = percent * (durmins * 60 + dursecs);
    }

    function seektimeupdate(){
       
        song_name.innerHTML= playingtrack;
        nt = audio.currentTime * (100 / audio.duration);
        progressBar.value = nt;
        curmins = Math.floor(audio.currentTime / 60);
        cursecs = Math.floor(audio.currentTime - curmins * 60);
        durmins = Math.floor(audio.duration / 60);
        dursecs = Math.floor(audio.duration - durmins * 60);
        if(cursecs < 10){ cursecs = "0"+cursecs; }
        if(dursecs < 10){ dursecs = "0"+dursecs; }
        if(curmins < 10){ curmins = "0"+curmins; }
        if(durmins < 10){ durmins = "0"+durmins; }
        curtimetext.innerHTML = curmins+":"+cursecs;
        durtimetext.innerHTML = durmins+":"+dursecs;
    }
  
}
window.addEventListener("load",initAdudio);

</script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
