@extends('layout.base')

@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Admin Tableau de bord</li>
    </ol>
</div>

<div class="main-container">
    <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{url('listVehicule')}}" title="Gestion des vehicules">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-time_to_leave"></i>
                    </div>
                    <div class="sale-num">
                        <h3>attente</h3>
                        <p>attente</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{url('listDepartService')}}" title="Gestion des departements">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-format_align_center"></i>
                    </div>
                    <div class="sale-num">
                        <h3>attente</h3>
                        <p>attente</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{url('listVisites')}}" title="Gestion des services" >
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-filter_list"></i>
                    </div>
                    <div class="sale-num">
                        <h3>attente</h3>
                        <p>attente</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{url('listPersonnel')}}" title="Gestion des personnel">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-people"></i>
                    </div>
                    <div class="sale-num">
                        <h3>attente</h3>
                        <p>attente</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Visitors</div>
                </div>
                <div class="card-body pt-0">
                    <div id="visitors"></div>
                </div>
            </div>
        </div>
    </div>

    @endsection