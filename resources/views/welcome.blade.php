@extends('layouts.master')

@section('estilos')
<style>
    *
    {
        outline: none !important;
        scroll-behavior: smooth;
    }
    body
    {
        font-family: 'Poppins', sans-serif;
    }
    header
    {
        position: relative;
        z-index: 1000000;
    }
    p{
        font-size: 1.15rem;
    }
    .navbar
    {
        background: transparent !important;
        transition: .5s;
    }
    .textMuebles
    {
        color:coral;
    }
    .textAfrica
    {
        color:burlywood
    }
    .navbar.scrolled
    {
        background: #000 !important;
        transition: .5s;
    }
    .navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link 
    {
        color: #000;
        background: #fff;
    }
    .navbar-light .navbar-nav .active>.nav-link:hover
    {
        color: #000;
    }
    .navbar-light .navbar-nav .nav-link 
    {
        color: rgba(255,255,255,.8);
    }
    .navbar-light .navbar-nav .nav-link:hover 
    .navbar-light .navbar-nav .nav-link:focus 
    {
        color: rgba(255,255,255,.1);
    }
    .navbar-light .navbar-brand,
    .navbar-light .navbar-brand:hover,
    .navbar-light .navbar-brand:focus,
    .navbar-light .navbar-brand:visited
    {
        /color: rgba(2550,255,255,1);
        font-size: 1.5rem;
        font-weight: 600;
    }
    .banner
    {
        position: relative;
        top: 0;
        width: 100%;
        height: 100vh;
        background: url(images/inicial.png);
        background-size: 100% 120%;
        margin-bottom: 0;
    }
    .banner:before
    {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 45%;
        /*background: linear-gradient(#000,transparent);*/
        pointer-events: none;
    }
    .banner:after
    {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 400px;
        background: linear-gradient(360deg,#000,transparent);
        pointer-events: none;
    }
    .height100p
    {
        height: 100vh;
    }
    .h100
    {
        height: 120%;
        /*margin-left: -5rem;*/
    }
    .titulo
    {
        letter-spacing: 10px;
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
        text-shadow: 0 5px 15px rgba(0,0,0,.5)  
    }
    .titulo span
    {
        color: burlywood;
        text-transform: uppercase;
        animation: animate 6s ease forwards infinite;
    }
    /* Ponenmos un delay por cada letra del título "Muebles África" esto para evitar que todas 
        realicen el movimiento a la vez sino que empiece una despues de la otra*/
    .titulo span:nth-child(1)  /*M*/
    {
        animation-delay: .1s;
    }
    .titulo span:nth-child(2)  /*u*/
    {
        animation-delay: .2s;
    }
    .titulo span:nth-child(3)  /*e*/
    {
        animation-delay: .3s;
    }
    .titulo span:nth-child(4)  /*b*/
    {
        animation-delay: .4s;
    }
    .titulo span:nth-child(5)  /*l*/
    {
        animation-delay: .5s;
    }
    .titulo span:nth-child(6)  /*e*/
    {
        animation-delay: .6s;
    }
    .titulo span:nth-child(7)  /*s*/
    {
        animation-delay: .7s;
        letter-spacing: 40px;
    }
    .titulo span:nth-child(8)  /*Á*/
    {
        animation-delay: .8s;
    }
    .titulo span:nth-child(9)  /*f*/
    {
        animation-delay: .9s;
    }
    .titulo span:nth-child(10) /*r*/
    {
        animation-delay: 1s;
    }
    .titulo span:nth-child(11) /*i*/
    {
        animation-delay: 1.1s;
    }
    .titulo span:nth-child(12) /*c*/
    {
        animation-delay: 1.2s;
    }
    .titulo span:nth-child(13) /*a*/
    {
        animation-delay: 1.3s;
    }
    @keyframes animate{
        0%, 100%
        {
            text-shadow: 0 0 0 #000;
        }
        50%
        {
            text-shadow: 0 30px 25px #000;
        }
    }
    .contentBox
    {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        z-index: 10;
    }
    .contentBox h1
    {
        font-weight: 800;
        color: #fff;
        text-transform: uppercase;
        font-size: 5rem;
    }
    .contentBox p
    {   
        color:#fff;
        font-size: 1.3rem;
    }
    .wrapper
    {
        margin-top: 15%;
    }
    button
    {
        position: absolute;
        transform: translate(-50%, -50%);
        background: none;
        color: #ccc;
        width: 240px;
        height: 80px;
        border: 1px solid #a35437;
        font-size: 18px;
        border-radius: 50px;
        transition: .6s;
        overflow: hidden;
    }
    button:focus
    {
        outline: none;
    }
    button::before
    {
        content: '';
        display: block;
        position: absolute;
        background: rgba(255, 255, 255, .9);
        width: 60px;
        height: 100%;
        left: 0;
        top: 0;
        opacity: .5s;
        filter: blur(30px);
        transform: translateX(-130px) skewX(-15deg);
    }
    button:after
    {
        content: '';
        display: block;
        position: absolute;
        background: rgba(255, 255, 255, .2);
        width: 30px;
        height: 100%;
        left: 30px;
        top: 0;
        opacity: 0;
        filter: blur(30px);
        transform: translate(-100px) skewX(-15deg);
    }
    button:hover
    {
        background: #a35437;
        cursor: pointer;
    }
    button:hover::before
    {
        transform: translateX(300px) skewX(-15deg);
        opacity: .6;
        transition: .7s;
    }
    button:hover:after
    {
        transform: translateX(300px) skewX(-15deg);
        opacity: 1;
        transition: .7s;
    }
    .sec1
    {
        padding: 100px 0;
        background-color:#000;
    }
    .headerText
    {
        font-size: 2.5rem;
        color: #fff;
    }
    .info 
    {
        font-family: 'Poppins', sans-serif;
        margin: 0 auto;
        display: flex;
        
        justify-content: space-between;
    }
    .info .box 
    {
        text-align: center;
    }
    .info .box .icon .fa 
    {
        font-size: 80px;
        cursor: pointer;
    }
    .info .box .icon h3, 
    .info .box .icon h4 
    {
        position: relative;
        overflow: hidden;
        font-weight: 300;
        margin: 0;
        padding: 2px 5px;
        font-size: 24px;
        transition-delay: 0.3333s;
        color: transparent;
        letter-spacing: 0px;
    }
    .info .box .icon h4 
    {
        font-weight: 600;
        margin: 5px 0;
        font-style: 30px;
    }
    .info .box .icon h3:before,
    .info .box .icon h4:before
    {
        content: '';
        position: absolute;
        top: 0;
        left: 100%;
        width: 100%;
        height: 100%;
        background: #00bcd4;
        transition: 1s;
    }
    .info .box .fa:hover ~ h3,
    .info .box .fa:hover ~ h4
    {
        color: #fff;
    }
    .info .box .fa:hover ~ h3:before
    {
        left: -100%;
    }
    .info .box .fa:hover ~ h4:before
    {
        left: initial;
        right: -100%;
    }
    .info .box .icon h4:before
    {
        left: initial;
        right: 100%;
        background: #9c27b0;
    }
    .headerText h2
    {
        font-size: 2.5rem;
        color: #fff;
        margin-bottom: 20px;
    }
    .placeBox
    {
        position: relative;
        height: 400px;
        margin: 0 auto; 
        background: #000;
        margin-top: 30px;
    }
    .placeBox .imgBx
    {
        width: 100%;
        height: 100%;
    }
    .placeBox .imgBx img
    {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    .placeBox .content
    {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: baseline;
        align-items: flex-end;
        opacity: 60%;
    }
    .placeBox .content h3
    {
        position: relative;
        margin: 0;
        padding: 10px;
        background: rgba(0,0,0,.95);
        color:#fff;
        font-size: 20px;
        font-weight: 600;
        width: 100%;
        text-align: center;
    }
    footer
    {
        background:rgba(0,0,0,.97);
        padding: 0;
    }
    .sci
    {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    .sci li
    {
        list-style: none;
        margin: 0 20px;
    }
    .sci li a
    {
        color: #777;
        font-size: 2em;
        transition: 0.5s;
    }
    .sci li a:hover
    {
        color: #fff;
    }
    .cpryt
    {
        margin-top: 5px;
        text-align: center;
        color: #777
    }
</style>
@endsection

@section('contenido')
<!-- Agrego al <header> la palabra "scroll" cuando me encuentre hasta el tope de la pagina -->
<header data-spy="scroll" data-target=".navbar" data-offset="50">
<!-- Utilizo un "navbar" de los que provee bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span class="textMuebles">muebles</span><span class="textAfrica">ÁFRICA</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('inicio-sesion')}}">
                            Iniciar sesión<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Sobre nosotros</a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>
</header>
<div class="jumbotron jumbotron-fluid height100p banner" id="login">
    <div class="container h100">
      <div class="contentBox h100">
        <h1>
            <div class="titulo">
                <span>M</span>  
                <span>u</span> 
                <span>e</span> 
                <span>b</span> 
                <span>l</span> 
                <span>e</span> 
                <span>s</span> 
                <span>Á</span> 
                <span>f</span> 
                <span>r</span> 
                <span>i</span> 
                <span>c</span> 
                <span>a</span> 
            </div>                    
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                ¿Qúe esperas? <br>¡Ven a nuestra sucursal y encuentra lo que estas buscando!
            </p>
            <div class="wrapper" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                <div class="btn">
                    <button type="button" onClick="location.href='{{route('inicio-sesion')}}'"> 
                        Iniciar Sesión
                    </button>
                </div>
            </div>
        </h1>
      </div>
    </div>
</div>    
<section class="sec1" id="about">
    <div class="container">
        <div class="row">
            <div class="offset-sm-2 col-sm-8">
                <div class="headerText text-center">
                    <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
                        Sobre Nosotros
                    </h2>
                    <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250">
                        Somos una empresa 
                    </p>
                </div>
                <div class="info">
                    <div class="box" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        <div class="icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <h4>Dirección</h4>
                            <h3>Guadalajra, </h3>
                        </div>
                    </div>
                    <div class="box" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <div class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4>Teléfono</h4>
                            <h3>11231412</h3>
                        </div>
                    </div>
                    <div class="box" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                        <div class="icon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <h4>Correo</h4>
                            <h3>maf@mail.com</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="placeBox" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500"> 
                    <div class="imgBx">
                        <img src="images/sucursal.png" class="img-fluid">
                    </div>
                    <div class="content">
                        <h3>
                            Sucursal
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="sci">
                    <li>
                        <a href="https://www.facebook.com/people/Susan-Gonzalez/100001981892283" target="blank"> 
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://github.com/juanchogamer360/MuebleriaAfrica" target="blank"> 
                            <i class="fa fa-github"></i>
                        </a>
                    </li>
                    <li>
                        <a href=""> <i class="fa fa-linkedin"></i></a>
                    </li>
                    <li>
                        <a href=""> <i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
                <p class="cpryt">
                    <a href="">© 2020 Muebles África, Inc</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script type=text/javascript>
    $(document).scroll(function () {
        $('.navbar').toggleClass('scrolled', $(this).scrollTop() > $('.navbar').height()) 
    })
</script>
@endsection