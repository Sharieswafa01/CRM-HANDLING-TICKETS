@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {!! session('status') !!}
                </div>
            @endif
            <div class="card" style="background-color: var(--bg-color); color: var(--text-color);">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: var(--primary-color); color: var(--text-color);">
                    Add Ticket
                    <!-- Back to Welcome Button -->
                    <a href="{{ route('welcome') }}" class="btn btn-transparent mb-3">
                         <i class="fas fa-home"></i> <!-- Home Icon -->
                                </a>

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="author_name" class="col-md-4 col-form-label text-md-right" style="color: var(--text-color);">Your Name</label>
                            <div class="col-md-6">
                                <input id="author_name" type="text" class="form-control @error('author_name') is-invalid @enderror" name="author_name" value="{{ old('author_name') }}" required autocomplete="name" autofocus>
                                @error('author_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="author_email" class="col-md-4 col-form-label text-md-right" style="color: var(--text-color);">Your Email</label>
                            <div class="col-md-6">
                                <input id="author_email" type="email" class="form-control @error('author_email') is-invalid @enderror" name="author_email" value="{{ old('author_email') }}" required autocomplete="email">
                                @error('author_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right" style="color: var(--text-color);">@lang('cruds.ticket.fields.title')</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right" style="color: var(--text-color);">@lang('cruds.ticket.fields.content')</label>
                            <div class="col-md-6">
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3" required>{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="attachments" class="col-md-4 col-form-label text-md-right" style="color: var(--text-color);">{{ trans('cruds.ticket.fields.attachments') }}</label>
                            <div class="col-md-6">
                                <div class="needsclick dropzone @error('attachments') is-invalid @enderror" id="attachments-dropzone"></div>
                            </div>
                            @error('attachments')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('global.submit')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedAttachmentsMap = {}
    Dropzone.options.attachmentsDropzone = {
        url: '{{ route('tickets.storeMedia') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
            size: 2
        },
        success: function (file, response) {
            $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
            uploadedAttachmentsMap[file.name] = response.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = file.file_name !== undefined ? file.file_name : uploadedAttachmentsMap[file.name]
            $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
        }
    }
</script>
@stop
