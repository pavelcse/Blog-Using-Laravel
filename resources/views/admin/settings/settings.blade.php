@extends('layouts.app')
@section('content')

    <div class="card">
        <div class="card-header">
            Update Site Settings
        </div>

        @include('admin.includes.errors')

        <div class="card-body">
            <form action="{{ route('settings.update') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input class="form-control" type="text" name="site_name" id="site_name" value="{{ $settings->site_name }}">
                </div>

                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input class="form-control" type="text" name="contact_number" id="contact_number" value="{{ $settings->contact_number }}">
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input class="form-control" type="email" name="contact_email" id="contact_email" value="{{ $settings->contact_email }}">
                </div>

                <div class="form-group">
                    <label for="address">Contact Address</label>
                    <input class="form-control" type="text" name="address" id="address" value="{{ $settings->address }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Update Site Settings</button>
                </div>
            </form>
        </div>
    </div>

@endsection