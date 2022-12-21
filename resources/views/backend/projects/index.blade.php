@extends('layouts.backend.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('b/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="card-box mb-30">
        <div class="pd-20 d-flex justify-content-between">
            <div class="w-50">
                <h4 class="text-black h2">All Posted Projects</h4>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-3 col-form-label">Filter by Service</label>
                    <div class="col-md-9 col-sm-12">
                        <div class="form-group">
                            <select name="service" class="selectpicker form-control">
                                <option value="">None</option>
                                @foreach ($services as $service)
                                    <option @if (app('request')->input('service') == $service->id) selected @endif value="{{ $service->id }}">
                                        {{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            @if (auth()->user()->type == 'company' or auth()->user()->type == 'admin')
                <a href="{{ route('admin.projects.create') }}" class="text-white">
                    <button class="btn btn-primary float-right">Create A New Project <i class="dw dw-add-file text-lg"></i>
                    </button>
                </a>
            @endif
        </div>
        <div class="pb-20">
            <table class="data-table table hover nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Name</th>
                        @if (auth()->user()->type == 'admin')
                            <th>Approved</th>
                        @endif
                        <th>Service</th>
                        <th>Description</th>
                        @if (auth()->user()->isAdmin())
                            <th>Author</th>
                        @endif
                        <th>Keywords</th>
                        <th data-order="1">Start Date</th>
                        <th class="datatable-nosort">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr class="@if ($project->approved) @else bg-light @endif">
                            <td class="table-plus">{{ $project->name }}</td>
                            @if (auth()->user()->type == 'admin')
                                <td>
                                    @if ($project->approved)
                                        <span class="text-success">Approved</span>
                                    @else
                                        <span class="text-warning">Pending</span>
                                    @endif
                                </td>
                            @endif
                            <td>{{ $project->service->name }}</td>
                            <td>{{ Str::substr($project->description, 0, 20) . '...' }} </td>
                            @if (auth()->user()->isAdmin())
                                <td>
                                    {{ $project->author->name }}
                                </td>
                            @endif
                            <td>{{ $project->keywords }}</td>
                            <td>{{ $project->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                        href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="{{ route('admin.projects.show', $project) }}"><i
                                                class="dw dw-eye"></i> View</a>
                                        @if ($project->author_id == auth()->user()->id ||
                                            auth()->user()->isAdmin())
                                            <a class="dropdown-item" href="{{ route('admin.projects.edit', $project) }}"><i
                                                    class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i>
                                                Delete</a>
                                        @endif
                                        @if (auth()->user()->isAdmin())
                                            <button onclick="document.getElementById('approve_form').submit()"
                                                @if ($project->approved) disabled @endif class="dropdown-item"><i
                                                    class="dw dw-edit"></i>
                                                @if ($project->approved)
                                                    Approved
                                                @else
                                                    Approve now
                                                @endif
                                            </button>
                                            <form id="approve_form" action="{{ route('admin.approve', $project) }}" hidden
                                                method="post">
                                                @csrf
                                            </form>
                                        @endif
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
    <script>
        $(document).ready(function() {
            $('.data-table').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                searchBuilder: {
                    columns: [1, 2, 4]
                },
                "lengthMenu": [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "All"]
                ],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search Here",
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'
                    }
                },

            });
        });
        $("select[name='service']").change(function(e) {
            e.preventDefault();
            window.location = `?service=${$(this).val()}`
        });
    </script>
@endpush
