{{--//***********le code de la boitede reception////*/--}}
{{--//***********le code de la boitede reception////*/--}}
@extends('layouts.app')

@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <!-- BEGIN INBOX -->
            <div class="col-md-12">
                <div class="grid email">
                    <div class="grid-body">
                        <div class="row">
                            <!-- BEGIN INBOX MENU -->
                            <div class="col-md-3">
                                <h2 class="grid-title"><i class="fa fa-inbox"></i> Inbox</h2>
                                <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Reply</a>

                                <hr>

                                    <div class="vertical-menu">
                                        <a class="nav-link" href="{{route('reclamations.index')}}"><i class="fa fa-inbox"></i> Inbox  <span class="badge badge-danger">{{$reclamationsreceived}}</span></a>
                                        <a class="nav-link" href="{{route('sent')}}"><i class="fa fa-rocket"></i> Sent <span class="badge badge-danger">{{$reclamationssent}}</span></a>
                                        <a class="nav-link" href=" "><i class="fa fa-user"></i> Vu par <span class="">  : @if($reclamation->reponse_gestionnaire){{ \App\User::find($reclamation->user_id)->name}}@endif</span></a>
                                    </div>

                            </div>
                            <!-- END INBOX MENU -->

                            <!-- BEGIN INBOX CONTENT -->
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label style="margin-right: 8px;" class="">
                                            <div class="icheckbox_square-blue" style="position: relative;"><input type="checkbox" id="check-all" class="icheck" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div>
                                        </label>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                Action <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Mark as read</a></li>
                                                <li><a href="#">Mark as unread</a></li>
                                                <li><a href="#">Mark as important</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Report spam</a></li>
                                                <li><a href="#">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>


                                </div>

                                <div class="padding"></div>

                                <div class="table-responsive">
                                    <main>
                                        <p class="text-center">New Message</p>


                                        <table class="table">
                                            <tr class="read">
                                                <td class="" width="20%" align="left">Client</td>
                                                <td  width="80%"><a href="#"> : {{$reclamation->client}} </a></td>
                                            </tr>
                                            <tr class="read">
                                                <td class="" width="20%" align="left">compagnie</td>
                                                <td width="80%">: {{$reclamation->compagnie_id}}<a href="#"></a></td>
                                            </tr>

                                            <tr class="read">
                                                <td class="" width="20%" align="left">Type de reclmation</td>
                                                <td width="80%">:<a href="#"> {{$reclamation->type_reclamations->libelle}}</a></td>
                                            </tr>
                                            <tr class="read">
                                                <td class="" width="20%" align="left">Reclmation</td>
                                                <td width="80%">:<a href="#"> {{$reclamation->observation_client}}</a></td>
                                            </tr>
                                        </table>

                                        <div class="row">
                                            <div class="col-sm-11 ml-auto">
                                                <div class="toolbar" role="toolbar">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-bold"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-italic"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-underline"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-align-left"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-align-right"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-align-center"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-align-justify"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-indent"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-outdent"></span>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-list-ul"></span>
                                                        </button>
                                                        <button type="button" class="btn btn-light">
                                                            <span class="fa fa-list-ol"></span>
                                                        </button>
                                                    </div>
                                                    <button type="button" class="btn btn-light">
                                                        <span class="fa fa-trash-o"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-light">
                                                        <span class="fa fa-paperclip"></span>
                                                    </button>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                                                            <span class="fa fa-tags"></span>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">add label <span class="badge badge-danger"> Home</span></a>
                                                            <a class="dropdown-item" href="#">add label <span class="badge badge-info"> Job</span></a>
                                                            <a class="dropdown-item" href="#">add label <span class="badge badge-success"> Clients</span></a>
                                                            <a class="dropdown-item" href="#">add label <span class="badge badge-warning"> News</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form  method="POST" ACTION="{{route('reclamations.update',['reclamation'=>$reclamation->id])}}">
                                                    @csrf

                                                     @method('PUT')
                                                    <div class="form-group mt-4">
                                                        <textarea class="form-control" id="message" name="reponse_gestionnaire" rows="12" placeholder="Click here to reply">{{$reclamation->reponse_gestionnaire}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Send Message</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </main>

                                </div>

                            </div>
                            <!-- END INBOX CONTENT -->

                            <!-- BEGIN COMPOSE MESSAGE -->
                            <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-wrapper">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-blue">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title"><i class="fa fa-envelope"></i> Compose New Message</h4>
                                            </div>
                                            <form action="#" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input name="to" type="email" class="form-control" placeholder="To">
                                                    </div>
                                                    <div class="form-group">
                                                        <input name="cc" type="email" class="form-control" placeholder="Cc">
                                                    </div>
                                                    <div class="form-group">
                                                        <input name="bcc" type="email" class="form-control" placeholder="Bcc">
                                                    </div>
                                                    <div class="form-group">
                                                        <input name="subject" type="email" class="form-control" placeholder="Subject">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="message" id="email_message" class="form-control" placeholder="Message" style="height: 120px;"></textarea>
                                                    </div>
                                                    <div class="form-group">														<input type="file" name="attachment">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Discard</button>
                                                    <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-envelope"></i> Send Message</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END COMPOSE MESSAGE -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END INBOX -->
        </div>
    </div>

    {{--/end la boite de reception--}}


    {{-- start modal   --}}
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form  action="{{ route('reclamations.store') }}" METHOD="post">
                @csrf
                <div class="modal-content">

                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="defaultForm-email">Type de reclamation</label>

                            <select class="custom-select"  name="reclamation">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">Observation</label>
                            <textarea id="w3review" name="observation_client" rows="4" cols="50">

                               </textarea>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-danger">Valide</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="text-center">
        <a href="" class="btn btn-danger btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">whrite a claim</a>
    </div>
    {{--    end modal--}}
@endsection


