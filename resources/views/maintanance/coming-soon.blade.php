<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$config->title_website}} - Coming Soon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('storage/images/logo/'.$config->icon)}}">
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto);

        #main{
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            text-align: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            font-family: 'Montserrat', sans-serif;
            color: white;
        }

        #hello{
            float: left;
            position: relative;
            top: 10em;
        }
        h3{
            position: absolute;
            margin: 0;
            padding: 0;
            left: 0;
            right: 0;
            top: 48%;
            float: left;
            letter-spacing: 0.3em;
        }

        h1{
            margin: 0;
            padding: 0;
            float: left;
            letter-spacing: 0.3em;
            position: relative;
        }
        @-webkit-keyframes animate-con {
            0%{opacity:0;}
            33.3%{opacity: 0;}
            100%{margin-top:20%;margin-bottom:0;margin-left:0;margin-right:0;}
        }

        #con
        {
            margin-top: 20%;
            -webkit-animation-name:             animate-con;
            -webkit-animation-duration:         5.5s;
            -webkit-animation-iteration-count:  1;
            -webkit-animation-timing-function: ease-out;
        }

        @-webkit-keyframes animate-one {
            0%{opacity:0;margin-right: 1500px;margin-bottom: 1000px;}
            70%{opacity: 0;}
            100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
        }

        #one
        {
            -webkit-animation-name:             animate-one;
            -webkit-animation-duration:         1.5s;
            -webkit-animation-iteration-count:  1;
            -webkit-animation-timing-function: ease-out;
        }


        @-webkit-keyframes animate-two {
            0%{opacity:0;margin-top: 1050px; margin-left: 100px;}
            70%{opacity: 0;}
            100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
        }

        #two
        {
            -webkit-animation-name:             animate-two;
            -webkit-animation-duration:         1.5s;
            -webkit-animation-iteration-count:  1;
            -webkit-animation-timing-function: ease-out;
        }


        @-webkit-keyframes animate-three {
            0%{opacity:0;margin-bottom: 1000px;margin-left: 0;margin-right: 0;}
            70%{opacity: 0;}
            100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
        }

        #three
        {
            -webkit-animation-name:             animate-three;
            -webkit-animation-duration:         1.5s;
            -webkit-animation-iteration-count:  1;
            -webkit-animation-timing-function: ease-out;
        }


        @-webkit-keyframes animate-four {
            0%{opacity:0;margin-top: 1000px;margin-left: 0;margin-right: 1500px;}
            70%{opacity: 0;}
            100%{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0;}
        }

        #four
        {
            -webkit-animation-name:             animate-four;
            -webkit-animation-duration:         1.5s;
            -webkit-animation-iteration-count:  1;
            -webkit-animation-timing-function: ease-out;
        }


        @-webkit-keyframes animate-five {
            0%{opacity: 0;}
            70%{opacity: 0;}
            100%{margin-top:0   ;margin-bottom:0;margin-left:0;margin-right:0;}
        }

        #five
        {
            -webkit-animation-name:             animate-five;
            -webkit-animation-duration:         1.5s;
            -webkit-animation-iteration-count:  1;
            -webkit-animation-timing-function: ease-out;
        }
        body{
            background-color: #232338;
            text-align: center;
        }
        .arm-left{
            animation: armSwipe 5s 1s infinite ease-in-out;
            transform-origin: left top;
        }
        @keyframes armSwipe{
            0%{transform: rotate(-10deg);}
            50%{transform: rotate(0deg);}
            100%{transform: rotate(-10deg);}
        }
        .arm-right{
            animation: armRightSwipe 5s 1s infinite ease-in-out;
            transform-origin: right top;
        }
        @keyframes armRightSwipe {
            0%{transform: rotate(-1deg);}
            50%{transform: rotate(-5deg);}
            100%{transform: rotate(-1deg);}
        }
        .astronaut{
            width: 50%;
            height: auto;
            overflow: visible;
            animation: Levitation 5s 1s infinite ease-in-out;
        }
        @keyframes Levitation{
            0%{transform: translateY(100px);}
            50%{transform: translateY(80px); }
            100%{transform: translateY(100px);}
        }
        .leg-right{
            animation: LegSwipe 5s 1s infinite ease-out;
            transform-origin: left bottom;
        }
        @keyframes LegSwipe {
            0%{transform: rotate(8deg);}
            50%{transform: rotate(5deg);}
            100%{transform: rotate(8deg);}
        }
        .leg-left{

        }
        @keyframes LegLeftSwipe {
            0%{transform: rotate(2deg);}
            50%{transform: rotate(0deg);}
            100%{transform: rotate(2deg);}
        }
        .reflect{
            animation: faceOpacity 5s 1s infinite;
        }
        @keyframes faceOpacity {
            0%{opacity: 0.7;}
            70%{opacity: 1;}
            100%{opacity: 0.7;}
        }
        .eye-right{
            animation: eyeBlink 5s infinite step-start 0s;
        }
        .eye-left{
            animation: eyeLeftBlink 5s infinite step-start 0s;

        }
        @keyframes eyeBlink {
            90%{transform: none; animation-timing-function: ease-in;}
            93%{transform: translateY(135px) scaleY(0);}
            100%{animation-timing-function: ease-in;}
        }
        @keyframes eyeLeftBlink {
            90%{transform: none; animation-timing-function: ease-in;}
            93%{transform: translateY(155px) scaleY(0);}
            100%{animation-timing-function: ease-in;}
        }
        .stars{
            width: 800px;
            fill:#fff;
            overflow: visible;
            animation: starsRotate 155s 1s linear;
            transform-origin: center;
        }
        @keyframes starsRotate {
            0%{transform: rotate(0deg);}
            100%{transform: rotate(360deg);}
        }

        @media (max-width: 450px) {
            .astronaut{
                margin-top: 20%;
            }
        }

    </style>
</head>
<body>
<div id="main">
    <div id="hello">
        <h1 id="one"></h1>
        <h1 id="two"></h1>
        <h1 id="three"></h1>
        <h1 id="four"></h1>
        <h1 id="five"></h1>
    </div>
    <h3 id="con">COMING SOON</h3>
</div>
<svg class="astronaut" viewBox="0 0 1167 807" xmlns="http://www.w3.org/2000/svg">
    <title>astronaute</title>
    <defs>
        <linearGradient x1="99.997%" y1="50%" x2=".002%" y2="50%" id="a">
            <stop stop-color="#DC818F" stop-opacity="0" offset="22.69%"/>
            <stop stop-color="#DC818F" offset="86.98%"/>
        </linearGradient>
        <linearGradient x1="49.987%" y1=".002%" x2="49.987%" y2="99.977%" id="b">
            <stop stop-color="#FFF" offset=".129%"/>
            <stop stop-color="#FFF" stop-opacity=".4" offset="50.46%"/>
            <stop stop-color="#FFF" stop-opacity=".1" offset="97.9%"/>
        </linearGradient>
    </defs>
    <g class="stars" fill-rule="evenodd"><circle cx="75" cy="212" r="2"/><circle cx="117.5" cy="300.5" r="1.5"/><circle cx="148" cy="251" r="2"/><circle cx="197" cy="140" r="1"/><circle cx="205" cy="192" r="2"/><circle cx="247.5" cy="280.5" r="1.5"/><circle cx="278" cy="231" r="2"/><circle cx="208" cy="161" r="2"/><circle cx="238" cy="59" r="2"/><circle cx="168" cy="359" r="2"/><circle cx="147" cy="319" r="2"/><circle cx="67.5" cy="120.5" r="1.5"/><circle cx="98" cy="71" r="2"/><circle cx="327" cy="120" r="1"/><circle cx="448" cy="212" r="2"/><circle cx="490.5" cy="300.5" r="1.5"/><circle cx="521" cy="251" r="2"/><circle cx="570" cy="140" r="1"/><circle cx="578" cy="192" r="2"/><circle cx="620.5" cy="280.5" r="1.5"/><circle cx="651" cy="231" r="2"/><circle cx="581" cy="161" r="2"/><circle cx="611" cy="59" r="2"/><circle cx="541" cy="359" r="2"/><circle cx="520" cy="319" r="2"/><circle cx="440.5" cy="120.5" r="1.5"/><circle cx="471" cy="71" r="2"/><circle cx="700" cy="120" r="1"/><circle cx="125" cy="572" r="2"/><circle cx="167.5" cy="660.5" r="1.5"/><circle cx="198" cy="611" r="2"/><circle cx="247" cy="500" r="1"/><circle cx="255" cy="552" r="2"/><circle cx="297.5" cy="640.5" r="1.5"/><circle cx="328" cy="591" r="2"/><circle cx="258" cy="521" r="2"/><circle cx="288" cy="419" r="2"/><circle cx="117.5" cy="480.5" r="1.5"/><circle cx="148" cy="431" r="2"/><circle cx="377" cy="480" r="1"/><circle cx="498" cy="572" r="2"/><circle cx="540.5" cy="660.5" r="1.5"/><circle cx="571" cy="611" r="2"/><circle cx="620" cy="500" r="1"/><circle cx="628" cy="552" r="2"/><circle cx="670.5" cy="640.5" r="1.5"/><circle cx="701" cy="591" r="2"/><circle cx="631" cy="521" r="2"/><circle cx="661" cy="419" r="2"/><circle cx="490.5" cy="480.5" r="1.5"/><circle cx="521" cy="431" r="2"/><circle cx="750" cy="480" r="1"/><circle cx="481" cy="709" r="2"/><circle cx="460" cy="669" r="2"/><circle cx="118" cy="709" r="2"/><circle cx="97" cy="669" r="2"/></g>

    <g fill="none" fill-rule="evenodd">
        <!-- leg right -->
        <g class="leg-right">
            <path d="M858.4 321.1L767 371.5l-86.5 47.7c-8.4 4.6-17.5 6.8-26.4 6.8-19.3 0-38.1-10.2-48.1-28.4-14.6-26.5-5-59.9 21.5-74.5L657 307l52.3-28.8 61.2-33.8L748 128.2c-5.8-29.7 13.6-58.5 43.4-64.3 13.3-2.6 26.5-.1 37.5 6.1 13.5 7.6 23.6 20.9 26.8 37.3l30.2 155.4c4.4 23.3-6.6 46.9-27.5 58.4z" fill="#DADAE5"/>
            <path d="M858.4 321.1L767 371.5c-23.2-7.8-55.3-19.1-75-26.6-14.7-5.6-28.9-22.1-35.1-37.9l29.1-16c60.8 5.1 89.7 40.9 89.7 40.9s48.3-27.8 68.3-38.3c20-10.5 15-18 12.5-28.9-1.2-5.3-8.8-46.3-16.5-87.6 17.8-7.6 24.4-18.7 25.2-20.1l20.5 105.7c4.6 23.3-6.4 46.9-27.3 58.4z" fill="#AAAAC1"/>
            <path d="M873.8 78.6L852.6 86l12.8 70.8s0 .1-.1.2l-9.6-49.7c-3.2-16.4-13.4-29.6-26.8-37.3-9.3 4-6.7 8.8-5.3 16.5.8 4.6 8.7 47.8 16.6 90.5-6.8 2.9-15.2 5.3-25.5 6.5-39.4 4.6-56.9-5.4-56.9-5.4l-22-119.4L878 19.5l30.7-8.5s16.4 47.9-34.9 67.6z" fill="#AAAAC1"/>
            <path d="M873.8 78.6L852.6 86l12.8 70.8s-6.2 12.1-25.2 20.3c-7.9-42.8-15.8-86-16.6-90.5-1.6-9-4.9-14 11.1-18.5 41-10.5 37.5-31 36-37l7.5-11.5 30.7-8.5c-.2-.1 16.2 47.8-35.1 67.5z" fill="#7E7E99"/>
            <path d="M869.5 45.8c-11.6 5.4-25.2 10.5-40 14.7-47.7 13.8-89.5 13.7-93.5.1-3.7-12.9 28.2-33.4 72.4-47.4 0 0 1.2-.3 2.4-.7 1.5-.5 3-.9 4.5-1.3C863-2.6 904.9-2.6 908.8 11c2.6 9.4-13.4 22.9-39.3 34.8z" fill="#5F5F77"/>
        </g>
        <!-- Body -->
        <g>
            <path d="M756.5 387.6c-.9-68.7-67.9-118.7-133.1-97.2-1.6.5 133.1 97.2 133.1 97.2z" fill="#DADAE5"/>
            <path d="M755 498l-227 96.3s-34.2-15.1-49-50.1c-22.2-52.4-24.8-133.4 6.9-147.9 11-5.1 22.6-10.3 34.6-15.5 48.7-21.2 103.7-42.7 147.8-53.9 45.7-11.6 91 6.2 115.2 40.8 0 0 6.8 10.3 8.1 23.8 1.3 13.5 10.6 92.3 10.6 92.3L755 498z" fill="#FFF"/>
            <path d="M793.6 429s-14.5-31.1-52.3-20c-42 12.3-32.4 35.8-91.2 58.9-21 8.3-49.6 19.9-76.9 31.3v-.1c-22.5 9.6-29.3 3.7-35.3-4.6-7.6-10.6-12.9-20.1-12.9-20.1l-38.7 15.9s-11.6 18.7-4.1 37.2c7.5 18.5 20.5 32.8 20.5 32.8l15 19.9c.8 1.2 1.7 2.5 2.7 3.7l8.1 10.4L755 498l47-14.1-8.4-54.9z" fill="#DADAE5"/>
            <path d="M721.7 385.8c.1 4.7-2.7 8.9-7.1 10.7l-194.5 79.9-7.1 2.9-23.2 9.5-4.2 1.7-11.1 4.5c-4.5 1.9-9.5-1.4-9.6-6.3l-.2-34c0-2.2-1.1-4.3-2.9-5.5l-104.7-73.5c-4.5-3.2-3.7-10 1.4-12l50.3-20.7 12.5-5.1 29.7-12.2 7.8-3.2 138.9-57c3.6-1.5 7.7-1 10.9 1.2l108 75.8c3 2.1 4.7 5.5 4.8 9.1l.3 34.2z" fill="#FFF"/>
            <path d="M721.7 385.8c.1 4.7-2.7 8.9-7.1 10.7l-204.5 84-26.6 10.9-9.1 3.7c-4.5 1.9-9.5-1.4-9.6-6.3l-.2-34c0-2.2-1.1-4.3-2.9-5.5l3.3 2.3c-4.4-3.2-3.7-10 1.4-12l15.8-6.5 31.8-13 191.7-78.7c3.6-1.5 8-.8 10.9 1.2 2.9 2.1 4.7 5.5 4.8 9.1l.3 34.1z" fill="#DADAE5"/>
            <path d="M525 474.4l-41.4 17c1.2-8.2 1.8-16.6 1.8-25.1 0-11.4-1.1-22.4-3.2-33.2l42.8-17.6v58.9z" fill="#AAAAC1"/>
            <path d="M481.8 433.3c-9.1-38.2-30.8-71.6-60.5-95.4l23.6-9.7c28.3 10.8 70 51.3 80.2 87.3l-43.3 17.8z" fill="#DADAE5"/>
        </g>
        <!-- Leg left -->
        <g class="leg-left" transform="translate(783 64)">
            <path d="M.4 303.7s0 .1 0 0l17.2-5.2 94.1-28.6L171 116.8S191.8 79 240.2 93c5.3 1.5 9.8 3.3 13.8 5.3 32.5 16.4 24.4 46.1 24.4 46.1s-66 184.4-71.5 197.3c-5.5 12.9-14.3 24.6-46.5 35.1-20.8 6.8-142.2 43.3-142.2 43.3L.4 303.7z" fill="#FFF"/>
            <path d="M382.7 67.2s-11.3 51-66 41.2l-22.2-4.7-25.9 67.9s-15 9.2-41.1 2.6c-5.2-1.3-10.7-3.2-16.7-6-36.4-16.6-46.4-34.4-46.4-34.4l43.4-114.7 132.4 36.4 42.5 11.7z" fill="#DADAE5"/>
            <path d="M10.6 365s141.6-34.1 146.7-35.7c7.3-2.3 14.7-3.7 21-26 5.5-19.5 53.1-149.2 68-192.3 32.5 16.4 32.1 33.5 32.1 33.5s-66 184.4-71.5 197.3c-5.5 12.9-14.3 24.6-46.5 35.1L19.1 420c-15.9-11.7-20.6-33.3-11-50.5l2.5-4.5" fill="#DADAE5"/>
            <path d="M382.7 67.2s-11.3 51-66 41.2l-22.2-4.7-25.9 67.9s-14.4 10.9-44.5 1.7c15.4-44 31.9-81.5 33.8-86.6 3.9-10.1 8.7-15 25.7-9.3 17 5.7 25.7 7.7 30.7-12 1.7-6.8 12.5-9.4 25.8-9.8l42.6 11.6z" fill="#AAAAC1"/>
            <ellipse fill="#7E7E99" transform="rotate(-74.93 295.346 42.94)" cx="295.346" cy="42.942" rx="19.7" ry="90.8"/>
            <path d="M12.3 328.4c-1.2 1.5-3.6.8-3.8-1.1-.6-5.3-2.4-14.2-8-23.5l17.1-5.2c1.8 6 3.6 18.3-5.3 29.8z" fill="#DADAE5"/>
        </g>
        <!-- Arm left-->
        <g class="arm-left">
            <path d="M584.9 697.3c-4.4 13.3-15.1 23.6-28.6 27.5L422.4 763l-33.3 9.5c-3.9 1.1-7.8 1.6-11.7 1.6-12.2 0-23.8-5.4-31.8-14.4-.3-.3-.5-.6-.8-.9-3-3.6-5.4-7.7-7.1-12.2-.4-1.1-.8-2.1-1.1-3.2-2.7-9.6-1.9-19.4 1.6-27.9 4.8-11.5 14.6-20.8 27.5-24.5l16-4.6 85.5-24.4h.2l5.6-1.6-.1-.1-60.8-79.3-.1-.1c-14.1-18.5 3.6-26.6 22.2-40.8l36.7-19.8 101 129.7 6.4 8.2c8.5 11.1 11 25.8 6.6 39.1z" fill="#FFF"/>
            <path d="M345.4 718.6l-7.2-3.2-14.3-6.3c-7.1-3.1-17-1.3-23.7.8-2.8.9-5 1.8-6.2 2.3-11.5 5.6-18 15.6-18 27.4 0 8.1 6.6 14.7 14.7 14.7 1 0 2-.1 3-.3 6.7-1.4 11.7-7.3 11.7-14.4 1.2-1.3 5.7-2.5 8.7-2.8l19.5 8.6c1.4.6 2.8 1 4.1 1.1 3 .4 6-.2 8.6-1.6.5-.2 1-.5 1.4-.8 1.5-1 2.8-2.3 3.9-3.9.5-.7.9-1.5 1.3-2.3.5-1.1.8-2.2 1-3.3 1.2-6.4-2.2-13.1-8.5-16z" fill="#AAAAC1"/>
            <path d="M422.4 763c-.1.2-.2.2-.2.2l-28.8 8.3c-20.6 5.8-22.3 13.4-22.3 20.2 0 7.1.3 10.9-9.3 13.9-3.2 1-6 1.3-9 1.3-4.5 0-9.2-1.9-16-6.3-15.1-9.8-28.1-22.5-32.9-27.3-5.1-5.1-9.2-10.3-10.3-19.4-.2-1.6-.3-3.3-.3-5.2 0-5.2.2-6.7.2-15.9 0-8 .9-16.6 6.6-23 3.2-3.5 7.8-6.4 14.6-8.2 14-3.6 33.4-8.2 66.9-15.4.3-.1.6-.1.9-.2 0 0 34.4 2.3 44.2 29.4.3.8.6 1.7.8 2.6 8 27.5-3.4 42.9-5.1 45z" fill="#DADAE5"/>
            <path d="M427.4 717.5c39.3-11.4 89.2-23.4 119.5-31.4 25-6.6 28.5-21.7 25-36.1l6.4 8.2c8.5 11.1 11 25.8 6.6 39.1s-15.1 23.6-28.6 27.5L422.4 763c-.1.2-1.3-2.1-1.3-2.1l6.3-43.4z" fill="#DADAE5"/>
            <path d="M363.7 735c-11.3 3.2-19 8.1-19 19.4 0 11.3.1 32.6.1 32.6s-.7 17.8 8 20c2.9 0 5.8-.3 9-1.3 9.6-3 9.3-6.7 9.3-13.9 0-6.8 1.6-14.4 22.3-20.2l28.8-8.3.2-.2c1.7-2.1 13.1-17.5 5.2-44.8-.1-.2-.1-.4-.2-.7L363.7 735z" fill="#AAAAC1"/>
            <path d="M486.3 490.3l-74.1 90.6c0 .1 60.8 79.4 60.8 79.4l13-4c9.8-3 13.5-15 6.9-22.9l-11.1-15.8c-11-15.7-27-40.1-13.2-56.5 3.2-3.8 7.5-6.4 12.1-7.8 9.1-2.8 16.6-.1 22 7.1 0 0 6.7-19.1 6.7-40 0-21.1-23.1-30.1-23.1-30.1z" fill="#DADAE5"/>
        </g>
        <!-- Arm right-->
        <g class="arm-right">
            <path d="M32.3 563.9c7.4 5.3 16 7.8 24.4 7.8 4.4 0 8.8-.7 13-2 8.5-2.7 16.1-8.1 21.7-15.9l57.9-81.9 71.9 23.3 63.8 20.6c22.3 7.2 46.2-5 53.4-27.3 7.2-22.3-5-46.2-27.3-53.4l-165.3-53.5c-17.7-5.7-37 .7-47.7 15.9l-76 107.3c-13.5 19.1-8.9 45.5 10.2 59.1z" fill="#DADAE5"/>
            <path d="M154.2 436.3L255 467.1s-14 11.8-33.9 28l-71.9-23.3-27.2 38.7c0-2.2-.6-17.8-15.6-32.4 9.5-12.6 19.4-25.7 26.1-34.7 5-6.7 13.7-9.5 21.7-7.1z" fill="#AAAAC1"/>
            <path d="M.8 547.2v12.7c0 15.5 6.5 25.1 17.9 25.1h56c3.7 0 6.8-.7 8.2-1.1 8.1-2.1 14.7-10.3 14.7-21.4 0-2.5-.4-4-.3-7.9.1-6.6-.5-7.5 5.5-16.9.1-.2.3-.4.4-.7 0 0 1.6-2.2 3.8-5.2l15.1-21.3c0-2.2-.6-17.8-15.6-32.4-2.5-2.4-5.4-4.9-8.9-7.2-25.4-17.3-55.1 4-55.1 4-21.6 27.3-20.3 25.5-28.9 37.3C2.1 528 .8 535.1.8 547.2z" fill="#AAAAC1"/>
            <path d="M74.2 580.2c4.9 4.3 12.3 3.6 16.9-1 3.9-3.9 6.5-9.7 6.5-16.9 0-2.5-.4-3.9-.3-7.8.1-6.6-.5-7.4 5.5-16.8.1-.2.3-.4.4-.6 0 0 1.6-2.2 3.8-5.2l15.1-21.3c0-2.2-.6-17.8-15.6-32.4-12.4 16.5-24.3 32.2-28 36.8-8.7 10.9-7.6 16-7.6 33-.2 12-4.3 25.5 3.3 32.2z" fill="#7E7E99"/>
            <path d="M122.8 566.8c5.3-1.1 9.6-5.3 10.4-10.9l1.1-8c0-.3.1-.6.1-1 .7-9.7-3.5-20-10.7-26.7-7.5-7-17.7-9.9-28.7-8.4-7.1 1-12.1 7.6-11.1 14.8 1 7.1 7.6 12.1 14.8 11.1 4.8-.7 6.7 1.1 7.3 1.6 1.6 1.5 2.5 3.9 2.5 5.5l-1.1 7.3c-1 7.1 3.9 13.7 11.1 14.8 1.4.2 2.9.2 4.3-.1z" fill="#7E7E99"/>
        </g>
        <!-- Hemlet -->
        <g>
            <path d="M443.3 475.3c0 58-32.6 108.5-80.4 134.2-10.5 2.1-21.3 3.3-32.4 3.3-90.4 0-163.7-73.3-163.7-163.7 0-34 10.4-65.6 28.2-91.8 26.2-21.4 59.6-34.2 96-34.2 84-.1 152.3 68.2 152.3 152.2z" fill="#1A0029"/>
            <path d="M291 301.9c-14.4 0-28.5 1.8-41.9 5.1 24-13.8 51.7-21.7 81.3-21.7 90.4 0 163.7 73.3 163.7 163.7 0 53.1-25.3 100.3-64.5 130.2 21.8-29 34.7-65 34.7-104 .1-95.5-77.7-173.3-173.3-173.3z" fill="#BABACC"/>
            <path d="M291 323c-36.4 0-69.8 12.8-96 34.2 6.1-9 13.1-17.4 20.9-25.1 9.9-9.7 21.1-18.2 33.2-25.1 13.4-3.3 27.4-5.1 41.9-5.1 95.6 0 173.4 77.8 173.4 173.4 0 39-12.9 75-34.7 104-9.4 7.2-19.5 13.3-30.3 18.4-11.5 5.3-23.7 9.3-36.5 11.9 47.8-25.7 80.4-76.2 80.4-134.2C443.3 391.3 375 323 291 323z" fill="#DADAE5"/>
            <path d="M16.6 167c0 77.7 72.6 144.7 142.8 144.7 28.1 0 54.8-4.4 77.2-18 38.3-44.9 43.7-84.4 39.7-122.4-3.8-25.5-15.7-71.2-66.3-107.3-46.3-31.5-97.5-29.9-134.9-17.6C37 73.2 16.6 117 16.6 167z" fill="url(#a)" opacity=".22" transform="translate(166 285)"/>
        </g>
        <!-- Face -->
        <g class="face" transform="translate(181 344)">
            <path d="M248.7 125.6c0 4.9-.3 9.6-.9 14.3-1.6 12.4-5.2 24.2-10.5 34.9-17.2 34.8-52.1 58.6-92.2 58.6-6.9 0-13.7-.7-20.3-2.1-47.6-9.8-83.4-53.3-83.4-105.7 0-29.4 11.4-56.1 29.8-75.6 18.8-19.9 45-32.2 73.9-32.2 57.2 0 103.6 48.3 103.6 107.8z" fill="#422C4F"/>
            <path d="M41.4 125.6c0 52.3 35.8 95.9 83.4 105.6 48.2-3.9 86.1-45.7 86.1-96.8 0-53.7-41.9-97.2-93.5-97.2-16.8 0-32.6 4.6-46.3 12.7-18.4 19.6-29.7 46.2-29.7 75.7z" fill="#A56D8A"/>
            <path d="M76.7 81.9c28.1 2.1 79.2-4.2 106-7.9 3.1-.4 5.8-.4 8.3 0 26.6 4.3 25.2 51.2 43.7 51.2 34 0 16.7-36.1 16.4-38.2-9.2-61-49.7-70.2-100.7-69.8-1.2 0-31.2-19.5-55.3-15.9-1.5.2-3.1.5-4.5 1C74.3 7 58.6 31.1 54 47.5c-4.2 15.1 2 32.8 22.7 34.4z" fill="#1A0029"/>
            <path d="M76.7 81.9c28.1 2.1 79.2-4.2 106-7.9 3.1-.4 5.8-.4 8.3 0-3-12.9-13.1-22-22.7-25.5s-26.4-11.1-28.8-23.3C136.2 8.3 121.8.8 95.2 1.3c-1.5.2-3.1.5-4.5 1-16.3 4.7-32 28.8-36.6 45.2-4.3 15.1 1.9 32.8 22.6 34.4z" fill="#3F3249"/>
            <g class="eye-left">
                <path d="M140.1 156.8c0 3.2-2.4 5.9-5.5 6.4-.3.1-.7.1-1.1.1-3.6 0-6.5-2.9-6.5-6.5 0-2.4 1.3-4.4 3.1-5.6 1-.6 2.1-.9 3.4-.9 3.7-.1 6.6 2.9 6.6 6.5z" fill="#1A0029"/>
                <path d="M137.8 157.6c0 2.4-1.3 4.4-3.2 5.6-.3.1-.7.1-1.1.1-3.6 0-6.5-2.9-6.5-6.5 0-2.4 1.3-4.4 3.1-5.6.3-.1.7-.1 1.1-.1 3.7 0 6.6 2.9 6.6 6.5z" fill="#422C4F"/>
            </g>
            <g class="eye-right">
                <path d="M67.6 136.1c0 3.6-2.9 6.5-6.5 6.5h-.5c-3.4-.2-6-3.1-6-6.5 0-2.7 1.6-5 3.9-6 .8-.4 1.7-.5 2.6-.5 3.6 0 6.5 2.9 6.5 6.5z" fill="#1A0029"/>
                <path d="M64.5 136.6c0 2.7-1.6 5-3.9 6-3.4-.2-6-3.1-6-6.5 0-2.7 1.6-5 3.9-6 3.4.3 6 3.1 6 6.5z" fill="#422C4F"/>
            </g>
            <path d="M86.1 134.2l-15.8 32.6c-.6 1.2.1 2.5 1.3 2.9l31.8 8.5c1.6.4 3-1.2 2.4-2.7l-16-41c-.6-1.8-2.9-1.9-3.7-.3z" fill="#824D72"/>
            <path d="M70.1 168.2c2 4.2 6 7 10.7 7.5l22.6 2.4-33.3-9.9z" fill="#663466"/>
            <path d="M139.9 114.2c.8-.5 2-1 3.6-1.4 1.5-.4 3.4-.6 5.4-.4.5 0 1 .1 1.5.2s1 .2 1.6.3c1 .3 2.1.7 3.1 1.2l1.5.8c.5.3.9.7 1.3 1 .9.6 1.6 1.5 2.3 2.2.7.7 1.2 1.7 1.6 2.5.5.8.8 1.6 1 2.4.2.8.5 1.5.5 2.1.1.7.1 1.1.1 1.5 0 .9-.7 1.1-1.4.5l-.9-.9c-.4-.4-1-.8-1.5-1.3-.5-.4-1-.9-1.6-1.4-.6-.4-1.1-1-1.8-1.3-.6-.4-1.2-.9-1.9-1.3-.3-.2-.7-.4-1-.6l-1.1-.5c-.7-.4-1.5-.7-2.2-1-.8-.3-1.5-.6-2.2-.9-.8-.3-1.5-.6-2.2-.8-.7-.3-1.4-.5-2.1-.7-1.4-.5-2.5-.8-3.3-1.1-.9 0-1.1-.6-.3-1.1zM69.3 99.9c-.5-.4-1.3-1-2.2-1.4-1-.4-2.2-.8-3.6-.8h-1.1c-.4 0-.7 0-1.1.1-.7.1-1.5.3-2.2.6l-1.1.5c-.3.2-.7.4-1 .6-.7.4-1.2 1-1.8 1.5-.6.5-1 1.2-1.4 1.7-.4.6-.7 1.2-.9 1.7-.2.6-.5 1.1-.6 1.6-.1.5-.2.8-.2 1.2-.1.7.4.9.9.5.3-.2.4-.3.7-.6.3-.3.7-.5 1.1-.8.4-.3.8-.6 1.3-.9.5-.3.9-.6 1.4-.8.5-.2.9-.6 1.5-.8.2-.1.5-.2.7-.4l.8-.3c.5-.3 1.1-.4 1.6-.6.5-.2 1.1-.3 1.6-.5.5-.1 1.1-.3 1.6-.4l1.5-.3c1-.2 1.8-.4 2.4-.5.4 0 .6-.5.1-.9z" fill="#1A0029"/>
            <ellipse fill="#995574" transform="rotate(-80.91 134.338 178.235)" cx="134.338" cy="178.235" rx="6.2" ry="10.4"/>
            <ellipse fill="#995574" transform="rotate(-67.245 57.134 153.927)" cx="57.134" cy="153.927" rx="5.1" ry="7.8"/>
            <path d="M84.5 186.7l.1.1s.1 0 .1.1c.1 0 .1.1.2.2.3.2.7.6 1.3 1 .3.2.6.4 1 .6.3.2.7.3 1.1.5.4.1.8.3 1.2.4l.6.2.6.1c.4.1.8.1 1.2.1H93c.4 0 .7-.1 1-.2.3 0 .6-.2.9-.2.3-.1.5-.1.8-.2.2-.1.4-.2.6-.2.3-.1.5-.2.5-.2 3.1-1.2 6.7.3 7.9 3.4 1.2 3.1-.3 6.7-3.4 7.9-.6.2-1.2.4-1.8.4 0 0-.4 0-1.1.1-.3 0-.7 0-1.2.1h-1.6c-.6 0-1.2 0-1.9-.2-.7-.1-1.4-.2-2.1-.4-.7-.2-1.4-.4-2.2-.7-.7-.3-1.4-.5-2.1-.9l-1-.5-.9-.6c-.6-.4-1.2-.9-1.7-1.3-.5-.5-1-.9-1.4-1.3-.4-.4-.8-.9-1.2-1.3-.7-.8-1.2-1.6-1.5-2.1-.2-.3-.3-.5-.4-.7l-.1-.2c-1-1.5-.6-3.5.9-4.5 1.5-1.4 3.5-1 4.5.5z" fill="#DBDAE5"/>
            <path d="M248.1 137c-1.4 31.1-15.1 22.5-15.1 22.5-1.5-2.3-2.1-5.1-1.6-8 .9-5.2 10.3-13.4 16.7-14.5z" fill="#2F1E38"/>
            <path d="M254.2 161.4c-1.5 6.3-7.4 10.6-14.3 9.5-6.9-1.1-11.5-7.2-10.4-13.5 1.1-6.4 14.6-11.6 21.4-12.5 6.2-.8 5.6 6.7 3.3 16.5z" fill="#422C4F"/>
            <path class="reflect" d="M6.8 64.7C23 21.8 51.8 9.2 77.5 7.9c26-1.3 49.8 18.8 52.5 47.3C133.1 87 110.3 114 82.5 114c-23.8 0-55 14.5-49.1 74.1.4 4.3-4.8 6.2-6.8 2.5C-10.2 122.9.7 80.8 6.8 64.7z" fill="url(#b)" opacity=".7"/>
        </g>
    </g>
    <!-- stars -->
</svg>
</body>

</html>