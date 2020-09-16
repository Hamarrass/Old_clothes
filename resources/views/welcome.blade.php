<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

                              <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modify</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="form" action=""   enctype="multipart/form-data" >
                                                            @csrf

                                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                                  <input type="hidden" name="id" id="id" value="{{$image->id}}">
                                                            <div class="form-group">
                                                                <label for="ville">ville</label>
                                                                <input type="text" class="form-control" id="ville" name="ville" placeholder="ville" required  value="{{old('ville')}}">
                                                                <div class="invalid-feedback">
                                                                    Veuillez entrer la ville
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="quartier">Quartier</label>
                                                                <input type="text" class="form-control" id="quartier"  name="quartier" placeholder="Quartier" required value="{{old('quartier')}}">
                                                                <div class="invalid-feedback">
                                                                    Veuillez entrer le Quartier
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="telephone">Tel</label>
                                                                <input type="number" class="form-control" id="telephone" name="telephone" value="06" required value="{{old('telephone')}}">
                                                                <div class="invalid-feedback">
                                                                    Veuillez entrer  tel
                                                                </div>
                                                            </div>

                                                            <div class="mb-3 pics animation all 2">
                                                                <div class="imgPreview"> </div>
                                                            </div>

                                                            @if(session()->has('statut')) <span style="color:green">Tres bien enrigestrer </span> @endif
                                                            <button class="btn btn-danger btn-block mt-4" id="update"  style=" display: none;" >Update </button>

                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                {{--   endModal--}}

                                        @foreach ($image->information_vendeurs()->get() as $im)

                                            <img src="{{$im->image_path}}" alt="" width="48.7%" height="180">

                                        @endforeach
                                        <br><br>

                                        <table>
                                            <tr>
                                                <td>
                                                    @can("update",$image)
                                                    <button type="button" class=" edit badge badge-success" data-toggle="modal"  data-id="{{$image->id}}" data-target="#exampleModal">
                                                        Modify
                                                    </button>
                                                    @endcan
                                                </td>
                                                <td>
                                                    @can("delete",$image)
                                                    <form action="{{route('infopositionvendeurs.destroy' ,["infopositionvendeur"=>$image->id])}}"   METHOD="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit"  class=" badge badge-dark"  >  delete</button>
                                                    </form>
                                                     @endcan
                                                </td>
                                                <td>  {{$image->updated_at}}</td>
                                            </tr>
                                        </table>




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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>

    $(document).on('click', '.edit', function(){

        var data_id = $(this).data('id');


        var url     ="{{route('infopositionvendeurs.edit',['infopositionvendeur'=>'id'])}}";
        url     =url.replace('id',data_id);
        $('#edit').css("display", "none");
        $('#update').css("display", "block");
        $.ajax({
            url : url,

            method:'get',
            data : {
                id : data_id
            },

            success:function(data)
            {
                $('#ville').val(data.ville);
                $('#quartier').val(data.quartier);
                $('#telephone').val(data.telephone);
                $('#id').val(data.id)
            }
        })


    });
    $(document).on('click', '#update', function(){

        var data_id = $("#id").val();


        var url     ="{{route('infopositionvendeurs.update',['infopositionvendeur'=>'id'])}}";
        url     =url.replace('id',data_id);
        $('#edit').css("display", "block");
        $('#update').css("display", "none");

        $.ajax({
            url : url,
            method:'PUT',
            data : {
                _token:'{{ csrf_token() }}',
                id        : data_id ,
                ville     : $('#ville').val() ,
                quartier  : $('#quartier').val() ,
                telephone : $('#telephone').val()

            },

            success:function(data)
            {

            }
        })


    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
