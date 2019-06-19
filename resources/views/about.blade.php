@extends('layouts.app')

<style>
    .img-social{
        max-height: 30px;
        max-width: 30px;
        margin-bottom: 7px;
    }

</style>

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h1>About</h1>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


            </div>
            <div class="col-md-4">
                <img src="/imgs/about/dp.jpg" class="img-thumbnail">
            </div>
        </div>

        <br>
        <h2>Contacts</h2>
        <br>
        <div class="row justify-content-center">

            <div clas="col-md-1">
                <img src="/imgs/about/fb.jpg" class="img-social">
                <br>
                <img src="/imgs/about/tter.png" class="img-social">
                <br>
                <img src="/imgs/about/gram.png" class="img-social">
            </div>
            <div class="col-md-5">
                <p>facebook.com/foddit</p>
                <p>twitter.com/foddit</p>
                <p>instagram.com/foddit</p>
            </div>
            <div clas="col-md-1">

            </div>
            <div class="col-md-5">
                <p> Email: support@foddit.com</p>
                <p>Offices: Atec-Perafita</p>
                <p>Phone: 9177-tira-tira-mete-mete</p>
            </div>

    </div>


@endsection
