@extends('layouts.app')

@section('content')
<form action="/login" method="POST">
        @csrf()
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
                @error('email')
                    <div class="alert alert-danger mt-4">{{ $message }}</div>
                @enderror
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
                @error('password')
                    <div class="alert alert-danger mt-4">{{ $message }}</div>
                @enderror
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-12 text-end">
                    <button class="btn btn-primary">Signup</button>
                </div>
            </div>    
        </div>
    </form>

@endsection