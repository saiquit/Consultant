@extends('layouts.backend.app')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-black h2">All Projects</h4>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Name</th>
                    <th>Clients</th>
                    <th>Service</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td class="table-plus">{{$project->name}}</td>
                    <td>25</td>
                    <td>{{$project->service->name}}</td>
                    <td>{{Str::substr($project->description, 0 ,20) . '...'}} </td>
                    <td>{{$project->created_at->diffForHumans()}}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('admin.projects.show', $project) }}"><i
                                        class="dw dw-eye"></i> View</a>
                                <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('b/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('b/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('b/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('b/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('b/vendors/scripts/datatable-setting.js') }}"></script>
@endpush