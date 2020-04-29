@extends('layouts.master')

@section('estilos')
<style>
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body
{
    font-family: montserrat, sans-serif;
}
.page-wrap
{
    display: flex;
    min-height: 100vh;
}
.left-panel
{
    background: url(images/login.png);
    background-size: 115% 100%;
    /*background-image: linear-gradient(to bottom right, #CC2E5D, #FF5858);*/
    flex: 1 1 66.666%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.left-panel .illustration
{
    margin-bottom: 50px;
}
.left-panel h2
{
    color: #fff;
    font-size: 48px;
    font-weight: 400;
    text-align: center;
    
}
.right-panel
{
    flex: 1 1 33.333%;
    padding: 25px;
}
.right-panel h1
{
    color: #FF5858;
    font-size: 48px;
    font-weight: 400;
    margin-bottom: 15%;

}
.right-panel h1 strong
{
    color: #CC2E5D;
    font-weight: 900;
    margin-bottom: 50px;
}
.animated-form h3
{
    color: #666;
    font-size: 25px;
    font-weight: 500;
    margin-bottom: 45px;
}
.animated-form .form-group
{
    margin-bottom: 45px;
    position: relative;
    display: flex;
}
.form-group.flex-end
{
    justify-content: flex-end;
}
.animated-form .form-group label
{
    position: absolute;
    top: 50%;
    left: 0px;   
    transform: translateY(-50%);
    color: #AAA;
    font-size: 20px;
    transition: 0.4s ease-out;
}
.animated-form .form-group input
{
    display: block;
    width: 100%;
    padding: 10px 0px;
    border: none;
    outline: none;
    background: none;
    border-bottom: 3px solid #AAA;
    color: #666;
    font-size: 20px;
    transition: 0.4s ease-out;
}
.animated-form .form-group:focus-within label,
.animated-form .form-group input:valid ~ label
{
    top: -2%;
    left: 0;
    transform: translateY(-100%);
    color: #FF5858;
}
.animated-form .form-group:focus-within input
{
    border-bottom-color: #FF5858;
}
.animated-form .form-group.flex-end
{
    margin-bottom: 25px;
}
.animated-form .form-group .button
{
    margin-top: 8%;
    display: inline-block;
    width: auto;
    padding: 15px 75px;
    border: 3px solid #FF5858;
    border-radius: 999px;
    background-image: linear-gradient(to right, transparent 50%, #CC2E5D, #FF5858);
    background-size: 400%;
    text-align: center;
    color: #FF5858;
    font-size: 20px;
    font-weight: 500;
    cursor: pointer;
}
.animated-form .form-group .button:hover
{
    color: #FFF;
    background-position: 100%;
    border: 3px solid #FFF;
}
.animated-form .lost-password a
{
    color: #FF5858;
    font-size: 16px;
    font-weight: 400;
    text-decoration: none;
    padding-bottom: 5px;
    border-bottom: 2xpx solid transparent;
}
.animated-form .lost-password a:hover
{
    border-bottom-color: #FF5858;   
}
</style>
@endsection

@section('contenido')
    <div class="page-wrap">
        <div class="left-panel">
            <h2>
                
            </h2>
        </div>
        <div class="right-panel">
            <h1>
                <strong>
                    Bienvenido,
                </strong>
                Usuario
            </h1>
            <form class="animated-form">
                <h3>Iniciar sesión</h3>
                <div class="form-group">
                    <input type="text" id="username" class="username" required="">
                    <label for="username">Correo electrónico</label>
                </div>
                <div class="form-group">
                    <input type="password" id="password" class="password" required=""/>
                    <label for="password">Contraseña<a href=""></a></label>
                </div>
                <div class="form-group flex-end">
                    <input type="sumbit" value="INICIAR SESIÓN" class="button"/>
                </div>
                <div class="lost-password">
                    <a href="" class="link">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>
    </div>
@endsection




