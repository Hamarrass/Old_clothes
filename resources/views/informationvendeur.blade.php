@extends('layouts.app')

@section('content')
<div class="container">
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
                                  <div class="col-*-*">
                                      <a href="{{route('map.index')}}" class="link btn btn-danger" >       Click here to show a map   </a>
                                      <a href="{{route('archive')}}" class="link btn btn-danger">          Archive                    </a>
                                      <a href="{{route('allinfoposition')}}" class="link btn btn-danger">  ALL                        </a>
                                      @can('socret')<a href="{{route('socret')}}" class="link btn btn-danger">           Socret                     </a> @endcan
                                      <p>{{$images->count()}}</p>
                                  </div>
{{--                                        **********************************************************start formulaire *************************************************************--}}
                                        <div class="container">
                                            <br>
                                            <form id="form" action="{{route('infopositionvendeurs.store')}}" METHOD="POST"   enctype="multipart/form-data" >
                                                @csrf
                                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                <input type="hidden"  id="id" value="">
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

                                                <div class="custom-file">
                                                    <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple" >
                                                    <label class="custom-file-label" for="images">Choose image</label>
                                                </div>
                                                @if(session()->has('statut')) <span style="color:green">Tres bien enrigestrer </span> @endif
                                                <input class="btn btn-primary btn-block mt-4" id="edit" type="submit" style=" display: block;" value="valider">

                                            </form>
                                            <button class="btn btn-danger btn-block mt-4" id="update"  style=" display: none;" >Update </button>

                                            <br><bR>

                                        @foreach ($images as $image)
                                            @if($image->created_at->diffInHours()<1)
                                               @component('components.badge')
                                                   new
                                               @endcomponent
                                            @else
                                               @component('components.badge',['type'=>'danger'])
                                                   Old
                                                @endcomponent
                                            @endif

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
                                                        <td>   </td>
                                                        <td>  <button type="button"  id="" class="edit badge badge-secondary" data-id="{{$image->id}}" >  Modify</button>  </td>
                                                        <td>
                                                            @if(!$image->deleted_at)
                                                                    <form action="{{route('infopositionvendeurs.destroy' ,["infopositionvendeur"=>$image->id])}}"   METHOD="POST">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <button type="submit"  class=" badge badge-danger"  >  delete</button>
                                                                    </form>
                                                             @else
                                                                    <form action="{{url('/infopositionvendeurs/'.$image->id.'/restore')}}"   METHOD="POST">
                                                                        @csrf
                                                                        @method('patch')

                                                                        <button type="submit"  class=" badge badge-success"  >  restaure </button>
                                                                    </form>

                                                                    <form action="{{url('/infopositionvendeurs/'.$image->id.'/forcedelete')}}"   METHOD="POST">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <button type="submit"  class=" badge badge-dark"  >  Delete </button>
                                                                    </form>
                                                             @endif

                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            @foreach ($image->information_vendeurs()->get() as $im)

                                                 <img src="{{$im->image_path}}" alt="" width="49.6%" height="180">

                                             @endforeach

                                              <br><br>
                                            <hr  style="height:2px ; background-color: grey ; width:50%">

                                          @endforeach

                                        </div>

@forelse($usermoresharer  as $usermoreshare)
    <p>{{$usermoreshare->name}}</p>
    <p>{{$usermoreshare->info_position_vendeurs_count}}</p>
      @empty
     <p>nothing</p>
    @endforelse



                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('jsinfovendeur')

    <script>
        (function() {
            "use strict"
            window.addEventListener("load", function() {
                var form = document.getElementById("form")
                form.addEventListener("submit", function(event) {
                    if (form.checkValidity() == false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add("was-validated")
                }, false)
            }, false)
        }())
    </script>

    {{--update--}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script>


        // show what you want to ubdate
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
        //update
        $(document).on('click', '#update', function(){

            var data_id = $("#id").val();

            var url     ="{{route('infopositionvendeurs.update',['infopositionvendeur'=>'id'])}}";
            url     =url.replace('id',data_id);
            alert(url);
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
                    alert(data);
                }
            })


        });

        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);

                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });


    </script>
@endsection

