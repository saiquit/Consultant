@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-black h2">All Email Request</h4>
        </div>
        <div class="pb-20">
            <table class="data-table table stripe hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Service Name</th>
                        <th>Start Date</th>
                        <th class="datatable-nosort">Complete</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($email_req->count())
                    @foreach ($email_req as $req)
                        <tr>
                            <td class="table-plus">{{ $req->name }}</td>
                            <td><a href="mailto:{{ $req->email }}">{{ $req->email }}</a></td>
                            <td class="">{{ $req->phone }}</td>
                            <td>{{ $req->message }}</td>
                            <td>{{ App\Models\Service::find($req->service_id)->name }}</td>
                            <td>{{ Carbon\Carbon::parse($req->created_at)->format('d M Y') }}
                            </td>
                            <td>
                                @if ($req->complete)
                                    <span class="text-green ">Complete</span>
                                @else
                                    <a href="{{ route('admin.email-request-comp', $req->id) }}">
                                        <span class="badge badge-danger">Incomplete</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @endif
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
