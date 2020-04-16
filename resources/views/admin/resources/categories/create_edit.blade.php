@extends('admin.admin')

@section('content')

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">
                <span><i class="fa fa-edit"></i></span>
                <span>{{ isset($item)? 'Edit the ' . $item->name . ' entry': 'Create a new Resource Category' }}</span>
            </h3>
        </div>

        <form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

            <div class="card-body">

                @include('admin.partials.info')

                <fieldset>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ form_error_class('name', $errors) }}">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Please insert the Name" value="{{ ($errors && $errors->any()? old('name') : (isset($item)? $item->name : '')) }}">
                                {!! form_error_message('name', $errors) !!}
                            </div>
                        </div>
                    </div>
                </fieldset>

            </div>

            @include('admin.partials.form.form_footer')
        </form>
    </div>

@endsection
