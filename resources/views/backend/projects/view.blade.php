@extends('layouts.backend.app')
@php
    $submitted = $project->email_responses->contains(auth()->user()->id);
@endphp
@section('content')
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title float-left">
                        <h4>{{ $project->name }}</h4>
                    </div>

                    @if (auth()->user()->type == 'expert')
                        <div class="float-right">
                            <button class="btn btn-warning" data-toggle="modal" data-target="#send_email_modal">Refer a
                                friend</button>
                            <button class="btn btn-primary @if ($submitted) btn-success @endif"
                                data-toggle="modal" data-target="#request_form_modal"
                                @if ($submitted) disabled @endif>
                                @if ($submitted)
                                    Sent
                                @else
                                    Accept project
                                @endif
                            </button>
                        </div>
                        <div class="modal fade bs-example-modal-lg" id="request_form_modal" tabindex="-1" role="dialog"
                            aria-labelledby="requestModal" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('admin.reqForProject', $project) }}" id="req_modal"
                                        method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="requestModal">Request for this project</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input
                                                        class="@if ($errors->has('subject')) form-control-danger @endif form-control"
                                                        type="text" name="subject" value="{{ old('subject') }}"
                                                        placeholder="Subject">
                                                    @if ($errors->has('subject'))
                                                        <div class="alert alert-danger alert-dismissible fade show"
                                                            role="alert">
                                                            <strong>{{ $errors->first('subject') }}</strong>
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="html-editor">
                                                        <h4 class="h4 text-blue">Body</h4>
                                                        <textarea
                                                            class="@if ($errors->has('body')) form-control-danger @endif textarea_editor form-control border-radius-0"
                                                            name="body" placeholder="Enter body ...">{{ old('body') }}</textarea>
                                                        @if ($errors->has('body'))
                                                            <div class="alert alert-danger alert-dismissible fade show"
                                                                role="alert">
                                                                <strong>{{ $errors->first('body') }}</strong>
                                                                <button type="button" class="close" data-dismiss="alert"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" type="submit"
                                                onclick="document.getElementById('req_modal').submit()">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @elseif (auth()->user()->type == 'admin')
                        <div class="float-right">
                            <button onclick="document.getElementById('approve_form').submit()"
                                @if ($project->approved) disabled @endif
                                class="btn btn-success
                        @if ($project->approved) btn-info @endif">
                                @if ($project->approved)
                                    Approved
                                @else
                                    Approve now
                                @endif
                            </button>
                        </div>
                        <form id="approve_form" action="{{ route('admin.approve', $project) }}" hidden method="post">
                            @csrf
                        </form>
                    @elseif(auth()->user()->type == 'company')
                        <div class="float-right">
                            @if (!$project->approved)
                                <a class="text-white" href="{{ route('admin.projects.edit', $project) }}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                            @endif
                            <button class="btn btn-info text-white disabled">
                                @if ($project->approved)
                                    Approved
                                @else
                                    On Review
                                @endif
                            </button>
                        </div>
                    @endif
                </div>


            </div>
        </div>
        <div class="blog-wrap">
            <div class=" pd-0">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div class="blog-detail card-box overflow-hidden mb-30">
                            <div class="blog-img">
                                <img src="/b/vendors/images/img2.jpg" alt="">
                            </div>
                            <h4 class="p-4">About</h4>
                            <div class="blog-caption">
                                {!! $project->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card-box mb-30">
                            <h5 class="pd-20 h5 mb-0">Details</h5>
                            <div class="list-group">
                                <div class="list-group-item d-flex align-items-center justify-content-between">Last Date
                                    <span class="">{{ $project->last_date }}</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">Live
                                    <span class="badge badge-primary badge-pill">{{ $project->live ? 'Yes' : 'No' }}</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">Type
                                    <span
                                        class="badge badge-primary badge-pill text-capitalized">{{ ucfirst($project->type) }}</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">Location
                                    <span class="">{{ $project->location }}</span>
                                </div>
                                <div class="list-group-item d-flex align-items-center justify-content-between">Keywords
                                    <div>

                                        @if (str_contains($project->keywords, ','))
                                            @foreach (explode(',', $project->keywords) as $keyword)
                                                <span class="badge badge-primary badge-pill">{{ $keyword }}</span>
                                            @endforeach
                                        @else
                                            <span class="badge badge-primary badge-pill">{{ $project->keywords }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (auth()->user()->type == 'admin')
                            <div class="card-box mb-30">
                                <h5 class="pd-20 h5 mb-0">Experts requests</h5>
                                <div class="latest-post">
                                    <ul>
                                        @foreach ($project->users as $user)
                                            <li>
                                                <button
                                                    class="icon-copy dw dw-down-arrow-4 float-right btn btn-light btn-sm"
                                                    data-toggle="collapse" href="#collaps{{ $user->id }}"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="collaps{{ $user->id }}"></button>
                                                <h4>
                                                    <a class="btn-link" target="_"
                                                        href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a>
                                                </h4>
                                                <div class="collapse multi-collapse pt-20"
                                                    id="collaps{{ $user->id }}">
                                                    <div class="card card-body">
                                                        <h4>{{ $user->pivot->subject }}</h4>
                                                        <p>{!! $user->pivot->body !!}</p>
                                                        {{-- <a class="" href="mailto:{{$user->email}}"> --}}
                                                        <button class="btn btn-primary modal_btn" data-toggle="modal"
                                                            data-target="#send_email_modal"
                                                            data-email="{{ $user->email }}"> <i
                                                                class="icon-copy dw dw-email"></i> Send Email</button>
                                                        {{-- </a> --}}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="card-box mb-30 p-3">
                                <h5 class="mb-10">Refer a Expert</h5>
                                <div class="form-group">
                                    <input type="search" name="search_exp" placeholder="Search Here"
                                        class="search_box_exp form-control search-input" id="">
                                </div>
                                <div class="pd-20 card-box height-100-p">
                                    <div class="list-group search_exp_result">
                                    </div>
                                </div>
                            </div>

                            <div class="card-box mb-30">
                                <h5 class="pd-20 h5 mb-0">Sent Emails</h5>
                                <div class="latest-post">
                                    <ul class="list-group">
                                        @foreach ($project->email_responses as $user)
                                            <li class="list-group-item">
                                                <a href="@if (auth()->user()->isAdmin()) {{ route('admin.users.show', $user) }} @endif"
                                                    class="list-group-item list-group-item-action" aria-current="true">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1 text-black-50">{{ $user->name }}</h5>
                                                        <small>{{ $user->pivot->created_at->diffForHumans() }}</small>
                                                    </div>
                                                    <p class="mb-1">{{ $user->pivot->subject }}</p>
                                                    <small class="mb-1">{{ $user->pivot->body }}</small>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="send_email_modal" tabindex="-1" aria-labelledby="modal_label" aria-hidden="true">
        <form action="{{ route('admin.res-pro', $project) }}" method="post">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_label">Send Email.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label">Recipient Email:</label>
                            <input name="email" type="email" class="form-control" id="recipient-email">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea name="message" class="form-control" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('js')
    <script>
        // ajax search
        $(".search_box_exp").change(function(e) {
            e.preventDefault();
            ajax_search_exp_handler("{{ route('admin.ajax_exp') }}", $(this).val());
        })

        $('#send_email_modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('email')
            var modal = $(this)
            modal.find('.modal-title').text('Send Email to ' + recipient)
            modal.find('.modal-body input').val(recipient)
        })
    </script>
@endpush
