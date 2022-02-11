<!--ラボタスクページ(2)-->

@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="display:flex">
        
         <!--サイドバー -->
        <div class="col-md-2">
            <div class="list-group">
              <h3>Setting</h3>
              <a href="/setting/account" class="list-group-item list-group-item-action">アカウント</a>
              <a href="/setting/outline" class="list-group-item list-group-item-action active" aria-current="true">研究概要</a>
            </div>
        </div>
        
        <!--研究概要-->
        <div class="col-md-6" style="margin:0 auto;">
            <h1>Research Overview</h1>
            <div class="mt-5">
              <form action="/setting/outline" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                  <label for="theme" class="form-label">Theme</label>
                  <input type="text" class="form-control" id="theme" name="thema" value="{{ $authUser->thema }}">
                </div>
                <div class="mb-4">
                  <label for="background" class="form-label">Background</label>
                  <textarea class="form-control" name="background" id="background" style="height:100px;">{{ $authUser->background }}</textarea>
                </div>
                <div class="mb-4">
                  <label for="motivation" class="form-label">Motivation</label>
                  <textarea class="form-control" name="motivation" id="motivation" style="height:100px;">{{ $authUser->motivation }}</textarea>
                </div>
                <div class="mb-5">
                  <label for="object" class="form-label">Object</label>
                  <textarea class="form-control" name="object" id="object" style="height:100px;">{{ $authUser->object }}</textarea>
                </div>
                <div class="mb-3 d-grid gap-2 col-6 mx-auto">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection