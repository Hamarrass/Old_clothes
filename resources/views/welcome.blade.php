<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        html, body {
            background-color: cornflowerblue;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0 ;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;

        }

        ul.gallery{
            margin-left: 3vw;
            margin-right:3vw;
        }

        .zoom {
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            transition: all 0.35s ease-in-out;
            cursor: -webkit-zoom-in;
            cursor: -moz-zoom-in;
            cursor: zoom-in;
        }

        .zoom:hover,
        .zoom:active,
        .zoom:focus {
            /**adjust scale to desired size,
            add browser prefixes**/
            -ms-transform: scale(2.5);
            -moz-transform: scale(2.5);
            -webkit-transform: scale(2.5);
            -o-transform: scale(2.5);
            transform: scale(2.5);
            position:relative;
            z-index:100;
        }

        /**To keep upscaled images visible on mobile,
        increase left & right margins a bit**/
        @media only screen and (max-width: 768px) {
            ul.gallery {
                margin-left: 15vw;
                margin-right: 15vw;
            }

            /**TIP: Easy escape for touch screens,
            give gallery's parent container a cursor: pointer.**/
            .DivName {cursor: pointer}
        }
    </style>
</head>
<body>
@php
    use App\InfoPositionVendeur;
$images = InfoPositionVendeur::with('information_vendeurs')->get();
@endphp

@if (Route::has('login'))
    <div class="top-right links" style="color: black">
        @auth
            <a href="{{ route('informationvendeurs.index') }} " >    <span  style="font-size: large ; color: black">Home</span></a>  <a href="{{ route('reclamations.index') }}"> <span  style="font-size: large; color: black">Relamation</span></a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif


<div class="container" style="margin-top:6%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">

                        <div class="panel panel-primary">
                            <div class="panel-body">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>

                                    {{ Session::get('image') }}
                                @endif

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="container">
                                    <br>

                                    @foreach ($images as $image)
                                        <table class="table table-sm">
                                            <thead>
                                            <tr>
                                                <th scope="col">Ville               </th>
                                                <th scope="col">{{$image->ville}}   </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">Quartier             </th>
                                                <td>           {{$image->quartier}}  </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Tel                  </th>
                                                <td>         {{$image->telephone}}   </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nom de Vendeur       </th>
                                                <td>           </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        @foreach ($image->information_vendeurs()->get() as $im)

                                            <img src="{{$im->image_path}}" alt="" width="48.7%" height="180">

                                        @endforeach
                                        <br><br>
                                        <hr  style="height:2px ; background-color: grey ; width:50%">
                                    @endforeach

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>

