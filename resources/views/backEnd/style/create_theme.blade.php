@extends('backEnd.master')
@section('title')
    @lang('style.color_style')
@endsection
@push('css')
    <style>
        .color-input {
            height: 50px;
            padding: 0px !important;
            border: none !important;
            background: transparent;
        }
        .label{
            font-size: 18px;
        }
        .fw-500{
            font-weight: 500 !important;
        }
        .input-right-icon button.primary-btn-small-input {
            top: 8px;
            right: 11px;
        }
    </style>
@endpush
@section('mainContent')
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1>@lang('style.color_style')</h1>
                <div class="bc-pages">
                    <a href="{{ route('dashboard') }}">@lang('common.dashboard')</a>
                    <a href="#">@lang('style.style')</a>
                    <a href="#">@lang('style.color_style')</a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area">
        <div class="container-fluid p-0">
            {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'theme-store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <input type="hidden" id="old_bg_image" value="{{ asset('/public/backEnd/img/body-bg.jpg') }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-title">
                                    <h3 class="mb-15">@lang('style.Add New Color Theme')</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="primary_input">
                                    <label class="primary_input_label" for="title">
                                        {{ __('style.Theme Title') }} <span class="text-danger"> *</span>
                                    </label>
                                    <input type="text" name="title"
                                        class="primary_input_field {{ @$errors->has('title') ? ' is-invalid' : '' }}"
                                        id="title" required maxlength="191" value="{{ old('title') }}">
                                    
                                    @if ($errors->has('title'))
                                        <span class="text-danger" >
                                            <strong>{{ @$errors->first('title') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="primary_input_label" for="title">
                                    {{ __('style.background_type') }} <span class="text-danger"> *</span>
                                    </label>
                                <select
                                    class="primary_select {{ $errors->has('background_type') ? ' is-invalid' : '' }}"
                                    name="background_type" id="background-type">                                   
                                    
                                    <option value="image" {{ old('background_type') == 'image' ? 'selected' : '' }}>
                                        @lang('common.image') (1920x1400)</option>
                                    <option value="color" {{ old('background_type') == 'color' ? 'selected' : '' }}>
                                            @lang('style.color')</option>
                                </select>
                                @if ($errors->has('background_type'))
                                    <span class="text-danger invalid-select" role="alert">
                                        {{ $errors->first('background_type') }}
                                    </span>
                                @endif

                            </div>
                            <div class="col-lg-4" id="background-color">
                                <div class="primary_input">
                                    <label class="primary_input_label">@lang('style.color')<span class="text-danger"> *</span></label>
                                    <input class="primary_input_field color-input" type="color" name="background_color"
                                        autocomplete="off" value="{{ old('background_color') }}" id="background_color">


                                    @if ($errors->has('background_color'))
                                        <span class="text-danger" >
                                            {{ $errors->first('background_color') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4" id="background-image">                               
                                <div class="primary_input">
                                    <label class="primary_input_label">@lang('style.background_image')<span class="text-danger"> *</span></label>
                                    <div class="primary_file_uploader">
                                        <input class="primary_input_field" id="placeholderInput" type="text"
                                        placeholder="{{ isset($visitor) ? (@$visitor->file != '' ? getFilePath3(@$visitor->file) : trans('style.background_image') . ' *') : trans('style.background_image') . ' *' }}"
                                        readonly>
                                        <button class="" type="button">
                                            <label class="primary-btn small fix-gr-bg"
                                                for="addThemeImage">@lang('common.browse')</label>
                                                <input type="file" class="d-none" id="addThemeImage" name="background_image">
                                        </button>
                                    </div>
                                   
                                    @if ($errors->has('background_image'))
                                    <span class="text-danger d-block">
                                        {{ $errors->first('background_image') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row mt-15">
                            <div class="col-lg-12">
                                <img class="d-none previewImageSize" src="" alt="" id="themeImageShow" height="100%" width="100%">
                            </div>
                        </div>
                       
                        <div class="row">
                            @foreach ($colors as $color)
                                <div class="col-lg-3 mt-15" id="{{ $color->name . '_div' }}">
                                    <div class="primary_input">

                                        <label class="primary_input_label">{{ __('style.' . $color->name) }}<span class="text-danger"> *</span></label>
                                        <input type="color" name="color[{{ $color->id }}]"
                                            class="primary_input_field color-input color_field" id="{{ $color->name }}"  data-name="{{ $color->name }}"
                                            required value="{{ old('color.' . $color->id, color_theme()->title=="Lawn Green" ? $color->lawn_green  :$color->default_value) }}"
                                            data-value="{{ color_theme()->title=="Lawn Green" ? $color->lawn_green  :$color->default_value }}">
                                       
                                        @if ($errors->has('color'))
                                            <span class="text-danger" >
                                                {{ $errors->first('color') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-4 mt-25 text-left">

                                <div class="">

                                    <input type="checkbox" id="box_shadow"
                                        class="common-checkbox{{ @$errors->has('box_shadow') ? ' is-invalid' : '' }}"
                                        name="box_shadow" {{ old('box_shadow') ? 'checked' : '' }}>
                                    <label for="box_shadow">{{ __('style.box_shadow') }}</label>

                                </div>

                                @if ($errors->has('is_default'))
                                    <span class="text-danger validate-textarea-checkbox" role="alert">
                                        <strong>{{ @$errors->first('is_default') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-sm-6 col-md-4 mt-25 text-left">

                                <div class="">

                                    <input type="checkbox" id="is_default"
                                        class="common-checkbox{{ @$errors->has('is_default') ? ' is-invalid' : '' }}"
                                        name="is_default" {{ old('is_default') ? 'checked' : '' }}>
                                    <label for="is_default">{{ __('style.Make Default Theme') }}</label>

                                </div>

                                @if ($errors->has('is_default'))
                                    <span class="text-danger validate-textarea-checkbox" role="alert">
                                        <strong>{{ @$errors->first('is_default') }}
                                    </span>
                                @endif
                            </div>

                            <div class="col-12 mt-15">
                                <div class="submit_btn text-center d-flex flex-wrap justify-content-center gap-10">
                                    <button class="primary-btn semi_large2 fix-gr-bg" id="reset_to_default"
                                        type="button"><i class="ti-check"></i>{{ __('style.Reset To Default') }}
                                    </button>
                                    <button class="primary-btn semi_large2 fix-gr-bg" type="submit"><i
                                            class="ti-check"></i>{{ __('common.save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        {{ Form::close() }}
        </div>
    </section>
@endsection

@push('scripts')
    @include('backEnd.style.script')
    <script>
        $(document).on('change', '#addThemeImage', function(event) {
            $('#themeImageShow').removeClass('d-none');
            getFileName($(this).val(), '#placeholderInput');
            imageChangeWithFile($(this)[0], '#themeImageShow');
        });
    </script>
@endpush
