@extends('backend.dashboard.layout')
@section('status')
<div class="row pb-10">
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{$data['company']}}</div>
                    <div class="font-14 text-secondary weight-500">
                        Total Company
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#00eccf" style="color: rgb(0, 236, 207);">
                        <i class="icon-copy dw dw-calendar1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{$data['expert']}}</div>
                    <div class="font-14 text-secondary weight-500">
                        Total Experts
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);">
                        <span class="icon-copy ti-heart"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{$data['service']}}</div>
                    <div class="font-14 text-secondary weight-500">
                        Total Service
                    </div>
                </div>
                <div class="widget-icon">
                    <div class="icon">
                        <i class="icon-copy fa fa-stethoscope" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 mb-20">
        <div class="card-box height-100-p widget-style3">
            <div class="d-flex flex-wrap">
                <div class="widget-data">
                    <div class="weight-700 font-24 text-dark">{{$data['project']}}</div>
                    <div class="font-14 text-secondary weight-500">Projects Submitted</div>
                </div>
                <div class="widget-icon">
                    <div class="icon" data-color="#09cc06" style="color: rgb(9, 204, 6);">
                        <i class="icon-copy fa fa-money" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('new_users')
<div class="pb-20">
    <table class="data-table table stripe hover nowrap">
        <thead>
            <tr>
                <th class="table-plus datatable-nosort">Name</th>
                <th>Type</th>
                <th>Email</th>
                <th>Start Date</th>
                {{-- <th class="datatable-nosort">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($data['users'] as $user)
            <tr>
                <td class="table-plus">{{$user->name}}</td>
                <td>
                    @if ($user->type == 'expert')
                    <h2 class="badge text-capitalize badge-success"> {{$user->type}}
                        <span class="badge badge-light">{{$user->expertises()->count()}}</span>
                    </h2>
                    @elseif ($user->type == 'company')
                    <h2 class="badge text-capitalize badge-info"> {{$user->type}}</h2>
                    @elseif ($user->type == 'user')
                    <h2 class="badge text-capitalize badge-danger"> {{$user->type}}</h2>
                    @endif
                </td>
                <td>{{$user->email}} </td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                {{-- <td>
                    <div class="dropdown">
                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                            role="button" data-toggle="dropdown">
                            <i class="dw dw-more"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                            <a class="dropdown-item" href="{{ route('admin.users.show', $user) }}"><i
                                    class="dw dw-eye"></i> View</a>
                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                        </div>
                    </div>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection