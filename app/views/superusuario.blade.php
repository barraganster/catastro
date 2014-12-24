@extends('layouts.default')

@section('title')
    Bienvenido :: @parent
@stop

@section('menu')
    @include('admin.menu')
@append

@section('styles')
    <style>
        .gi-2x {
            font-size: 2em;
        }

        .gi-3x {
            font-size: 3em;
        }

        .gi-4x {
            font-size: 4em;
        }

        .gi-5x {
            font-size: 5em;
        }

        .huge {
            font-size: 40px;
        }
    </style>
@append

@section('content')


    <div class="page-header">
        <h2>Bienvenid@
            <small>{{Auth::user()->nombreCompleto()}}</small>
        </h2>
    </div>

    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-user gi-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{User::totalUsers()}}</div>
                            <div>Usuarios registrados</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('admin/user')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Administrar usuarios</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-lock gi-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">26</div>
                            <div>Permisos registrados</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('admin/permission')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Administrar permisos</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-tags gi-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">3</div>
                            <div>Roles registrados</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('admin/role')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Administrar roles</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="glyphicon glyphicon-th-list gi-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">26</div>
                            <div>Tipos de trámites</div>
                        </div>
                    </div>
                </div>
                <a href="{{URL::to('admin/tipotramites')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Administrar Tipo de trámites</span>
                        <span class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></span>

                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

    </div>
@stop
