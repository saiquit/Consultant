@extends('layouts.backend.app')

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')

<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-black h2">Company</h4>
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Company Name</th>
                    <th>Posted Projects</th>
                    <th>Approved Projects</th>
                    <th>Email</th>
                    <th>Start Date</th>
                    <th class="datatable-nosort">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="table-plus">{{ $user->name }}</td>
                    <td>
                        <p class="text-capitalize ">
                            {{ $user->posted_projects()->count() }}
                        </p>
                    </td>
                    <td>
                        <p class="text-capitalize ">

                            {{ $user->posted_projects()->where('approved', 1)->count() }}
                        </p>
                    </td>
                    <td>{{ $user->email }} </td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="{{ route('admin.users.show', $user) }}"><i
                                        class="dw dw-eye"></i> View</a>
                                <a class="dropdown-item" onclick="document.querySelector('#delete_form_2').submit()"><i class="dw dw-delete-3"></i> Delete</a>
                                <form  id="delete_form_2" action="{{ route('admin.users.destroy', $user) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
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