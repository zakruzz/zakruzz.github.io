<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/forms/select/select2.min.css')}}">
<style>
    .img-upload-border{
        border: 1px solid lightgray;
        width: 100%;
        display: flex;
        justify-content: center;
        padding: 25px;
        border-radius: 5px;
    }

    .img-upload{
        height: 80px;
    }

    .ck-content{
        height: 20rem;
    }


</style>

<style>
    #loader{
        display: none;
        width: 10%;
        height: 5px;
        background-image: linear-gradient(#ffee00, #ffc903);
        background-size: 100%;
        background-repeat: no-repeat;
        position: fixed;
        top: 0;
        left:0;
        right:0;
        transition: width .1s ease-in;
        -moz-transition: width .1s ease-in;
        -ms-transition: width .1s ease-in;
        -o-transition: width .1s ease-in;
        -webkit-transition: width .1s ease-in;
        box-shadow: 0 3px 6px rgb(0 0 0 / 16%), 0 3px 6px rgb(0 0 0 / 23%);
        z-index: 99999;
    }

    /* Image by > https://samherbert.net/svg-loaders/ */

    #loader:after{
        content: "";
        width: 100%;
        height: 100%;
        background-color: rgb(0 0 0 / 50%);
        background-image: url("data:image/svg+xml,%3Csvg width='120' height='30' xmlns='http://www.w3.org/2000/svg' fill='%23fff'%3E%3Ccircle cx='15' cy='15' r='15'%3E%3Canimate attributeName='r' from='15' to='15' begin='0s' dur='0.8s' values='15;9;15' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s' values='1;.5;1' calcMode='linear' repeatCount='indefinite'/%3E%3C/circle%3E%3Ccircle cx='60' cy='15' r='9' fill-opacity='.3'%3E%3Canimate attributeName='r' from='9' to='9' begin='0s' dur='0.8s' values='9;15;9' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='fill-opacity' from='.5' to='.5' begin='0s' dur='0.8s' values='.5;1;.5' calcMode='linear' repeatCount='indefinite'/%3E%3C/circle%3E%3Ccircle cx='105' cy='15' r='15'%3E%3Canimate attributeName='r' from='15' to='15' begin='0s' dur='0.8s' values='15;9;15' calcMode='linear' repeatCount='indefinite'/%3E%3Canimate attributeName='fill-opacity' from='1' to='1' begin='0s' dur='0.8s' values='1;.5;1' calcMode='linear' repeatCount='indefinite'/%3E%3C/circle%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: 72px auto;
        position: fixed;
        backdrop-filter: blur(10px);
        bottom: 0;
        left: 0;
        right: 0;
        top: 5px;
        z-index: 9999999;
    }

    /*Don't worry about this*/
    /*Don't worry about this*/
    /*Don't worry about this*/
    body{
        margint:0;
        padding:0;
    }
    iframe {
        width: 100%;
        min-height: 1000px;
        border: 0;
        overflow: hidden;
    }
    /*Don't worry about this*/
    /*Don't worry about this*/
    /*Don't worry about this*/

</style>
