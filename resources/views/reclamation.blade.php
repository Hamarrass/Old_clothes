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
                                <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;NEW MESSAGE</a>

                                <hr>

                                <div class="vertical-menu">
                                    <a class="nav-link" href="{{route('inbox')}}"><i class="fa fa-inbox"></i> Inbox <span class="badge badge-danger">{{$reclamationsreceived}}</span></a>
                                    <a class="nav-link" href="{{route('sent')}}"><i class="fa fa-rocket"></i> Sent <span class="badge badge-danger">{{$reclamationssent}}</span></a>
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

                                    <div class="col-md-6 search-form">
                                        <form action="#" class="text-right">
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm" placeholder="Search">
                                                <span class="input-group-btn">
                                            <button type="submit" name="search" class="btn_ btn-primary btn-sm search"><i class="fa fa-search"></i></button></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="padding"></div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>

                                        @foreach($reclamations as $reclamation)

                                            <tr>
                                                <td class="action"><input type="checkbox" /></td>
                                                <td class="action"><i class="fa fa-star-o"></i></td>
                                                <td class="action">@if($reclamation->seen_by) <i class="fa fa-bookmark"> </i> @else <i class="fa fa-bookmark-o"></i> @endif </td>
                                                <td class="name"><a href="{{route('reclamations.show',['reclamation'=>$reclamation->id])}}">{{$reclamation->client}}</a></td>
                                                <td class="subject"><a href="#" title=" Repondre par : @if($reclamation->reponse_gestionnaire){{ \App\User::find($reclamation->user_id)->name}}@endif">{{$reclamation->type_reclamations->libelle}} <span style="color: #0E9A00"> ||  {{$reclamation->compagnie_id}} </span></a></td>
                                                <td class="time"> {{$reclamation->created_at}} || <span class="badge badge-danger"> {{ date_diff(new \DateTime($reclamation->created_at), new \DateTime())->format("%m Mois , %d jours") }} </span></td>
{{--                                                {{ datediff($reclamation->created_at , now())}}--}}
                                            </tr>

                                        @endforeach

{{--                                        <tr class="read">--}}
{{--                                            <td class="action"><input type="checkbox" /></td>--}}
{{--                                            <td class="action"><i class="fa fa-star-o"></i></td>--}}
{{--                                            <td class="action"><i class="fa fa-bookmark"></i></td>--}}
{{--                                            <td class="name"><a href="#">Larry Gardner</a></td>--}}
{{--                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>--}}
{{--                                            <td class="time">08:30 PM</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td class="action"><input type="checkbox" /></td>--}}
{{--                                            <td class="action"><i class="fa fa-star"></i></td>--}}
{{--                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>--}}
{{--                                            <td class="name"><a href="#">Larry Gardner</a></td>--}}
{{--                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>--}}
{{--                                            <td class="time">08:30 PM</td>--}}
{{--                                        </tr>--}}

{{--                                        <tr>--}}
{{--                                            <td class="action"><input type="checkbox" /></td>--}}
{{--                                            <td class="action"><i class="fa fa-star"></i></td>--}}
{{--                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>--}}
{{--                                            <td class="name"><a href="#">Larry Gardner</a></td>--}}
{{--                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>--}}
{{--                                            <td class="time">08:30 PM</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="read">--}}
{{--                                            <td class="action"><input type="checkbox" /></td>--}}
{{--                                            <td class="action"><i class="fa fa-star-o"></i></td>--}}
{{--                                            <td class="action"><i class="fa fa-bookmark"></i></td>--}}
{{--                                            <td class="name"><a href="#">Larry Gardner</a></td>--}}
{{--                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>--}}
{{--                                            <td class="time">08:30 PM</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td class="action"><input type="checkbox" /></td>--}}
{{--                                            <td class="action"><i class="fa fa-star"></i></td>--}}
{{--                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>--}}
{{--                                            <td class="name"><a href="#">Larry Gardner</a></td>--}}
{{--                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>--}}
{{--                                            <td class="time">08:30 PM</td>--}}
{{--                                        </tr>--}}

{{--                                        <tr>--}}
{{--                                            <td class="action"><input type="checkbox" /></td>--}}
{{--                                            <td class="action"><i class="fa fa-star"></i></td>--}}
{{--                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>--}}
{{--                                            <td class="name"><a href="#">Larry Gardner</a></td>--}}
{{--                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>--}}
{{--                                            <td class="time">08:30 PM</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="read">--}}
{{--                                            <td class="action"><input type="checkbox" /></td>--}}
{{--                                            <td class="action"><i class="fa fa-star-o"></i></td>--}}
{{--                                            <td class="action"><i class="fa fa-bookmark"></i></td>--}}
{{--                                            <td class="name"><a href="#">Larry Gardner</a></td>--}}
{{--                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>--}}
{{--                                            <td class="time">08:30 PM</td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <td class="action"><input type="checkbox" /></td>--}}
{{--                                            <td class="action"><i class="fa fa-star"></i></td>--}}
{{--                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>--}}
{{--                                            <td class="name"><a href="#">Larry Gardner</a></td>--}}
{{--                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>--}}
{{--                                            <td class="time">08:30 PM</td>--}}
{{--                                        </tr>--}}

{{--                                        <tr>--}}
{{--                                            <td class="action"><input type="checkbox" /></td>--}}
{{--                                            <td class="action"><i class="fa fa-star"></i></td>--}}
{{--                                            <td class="action"><i class="fa fa-bookmark-o"></i></td>--}}
{{--                                            <td class="name"><a href="#">Larry Gardner</a></td>--}}
{{--                                            <td class="subject"><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </a></td>--}}
{{--                                            <td class="time">08:30 PM</td>--}}
{{--                                        </tr>--}}
                                        </tbody></table>

                                </div>

                                {{$reclamations->links()}}
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
                                        <option selected>Sélectionner le  type de reclamation </option>
                                    @foreach($type_reclamations as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                     @endforeach
                                </select>
                        </div>

                        <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Compagnie</label>

                                <select class="custom-select"  name="compagnie_id">
                                    <option selected>sélectionner  votre  compagnie </option>
                                    <option value="1">SAHAM</option>
                                    <option value="2">MATU</option>
                                    <option value="3">AXA</option>
                                    <option value="1">MAMDA</option>
                        </select>
                        </div>

                        <div class="md-form mb-5">
                            <i class="fas fa-lock prefix grey-text"></i>
                            <label data-error="wrong" data-success="right" for="defaultForm-pass">Observation</label>
                            <textarea id="w3review" name="observation_client" rows="4" cols="53">

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
        <a href="" class="btn btn-danger btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">write a claim</a>
    </div>



    {{--    end modal--}}
@endsection


