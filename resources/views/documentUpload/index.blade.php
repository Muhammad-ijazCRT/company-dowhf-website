

@extends('layouts.admin')
@push('script-page')
@endpush
@section('page-title')
    {{__('Document')}}
@endsection
@section('title')
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">{{__('Document')}}</h5>
    </div>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{__('Document')}}</li>
@endsection
@section('action-btn')
    @if(\Auth::user()->type=='company')
    <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal"
    data-bs-target="#exampleModal" data-url="{{ route('document-upload.create') }}"
    data-bs-whatever="{{__('Create New Document')}}">
        <i class="ti ti-plus text-white" data-bs-toggle="tooltip"  data-bs-original-title="{{__('Create')}}"></i>
    </a>

    @endif
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <!-- <h5></h5> -->
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th>{{__('Document')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Description')}}</th>
                                @if(\Auth::user()->type=='company')
                                    <th class="text-right">{{__('Action')}}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $document)
                            @php
                                $documentPath=\App\Models\Utility::get_file('uploads/documentUpload');
                                // $documentPath=asset(Storage::url('uploads/documentUpload'));
                            @endphp
                            <tr>
                                <td>
                                    @if(!empty($document->document))
                                        <a class="btn btn-sm btn-primary btn-icon rounded-pill" href="{{$documentPath.'/'.$document->document}}" target="_blank" download="">
                                            <i class="ti ti-download" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Download') }}"></i>
                                        </a>
                                        <a class="btn btn-sm btn-secondary btn-icon rounded-pill" href="{{$documentPath.'/'.$document->document}}" target="_blank"  >
                                            <i class="ti ti-crosshair" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Preview') }}"></i>
                                        </a>
                                    @else
                                        <p>-</p>
                                    @endif
                                </td>
                                <td>{{ $document->name }}</td>
                                <td>{{ $document->description }}</td>
                                @if(\Auth::user()->type=='company')
                                <td class="text-right">
                                    <div class="action-btn bg-info ms-2">
                                        <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-url="{{ route('document-upload.edit',$document->id) }}"
                                            data-bs-whatever="{{__('Edit Document')}}" data-bs-toggle="tooltip" title="Edit Document"
                                            data-bs-original-title="{{__('Edit Document')}}"> <span class="text-white"> <i
                                                    class="ti ti-edit" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Edit') }}"></i></span></a>
                                    </div>


                                    <div class="action-btn bg-danger ms-2">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['document-upload.destroy', $document->id]]) !!}
                                        <a href="#!" class="mx-3 btn btn-sm  align-items-center show_confirm ">
                                            <i class="ti ti-trash text-white" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Delete') }}"></i>
                                        </a>
                                        {!! Form::close() !!}

                                    
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

