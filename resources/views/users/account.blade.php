<!--ラボタスクページ(2)-->

@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="display:flex">
        
         <!--サイドバー -->
        <div class="col-md-2">
            <div class="list-group">
              <h3>Setting</h3>
              <a href="/setting/account" class="list-group-item list-group-item-action active" aria-current="true">アカウント</a>
              <a href="/setting/outline" class="list-group-item list-group-item-action">研究概要</a>
            </div>
        </div>
        
        <!--アカウント設定-->
        <div class="col-md-5" style="margin:0 auto;">
            <h1>Account</h1>
            <div class="mt-5">
              <div class="mb-4">
                  <label for="icon" class="form-label">Icon</label>
                  <div class="mb-2" id="icon">
                    <img src="{{ $authUser->icon }}" style="width:100px; height:100px; border-radius:50%; object-fit:cover; border:solid; border-width:thin; color:black;">
                  </div>
                  <form action="/setting/account" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="btn-group">
                        <input class="form-control form-control-sm" type="file" name="icon">
                        <input class="btn btn-secondary btn-sm" type="submit" value="Upload">
                    </div>
                  </form>
                  <div class="mt-2">
                      <form action="/setting/account/default" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="btn btn-secondary btn-sm" type="submit" value="put back default">
                      </form>
                  </div>
              </div>
              <form action="/setting/account" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                  <label for="name" class="form-label">User Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ $authUser->name }}">
                </div>
                <div class="mb-4">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{ $authUser->email }}">
                </div>
                <div class="mb-5">
                    <label class="form-label">Status</label><br>
                    @if($authUser->student_or_not == 0)
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="student_or_not" id="student" value=0 checked>
                          <label class="form-check-label" for="student">Student</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="student_or_not" id="teacher" value=1>
                          <label class="form-check-label" for="teacher">Teacher</label>
                        </div>
                    @else
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="student_or_not" id="student" value=0>
                          <label class="form-check-label" for="student">Student</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="student_or_not" id="teacher" value=1 checked>
                          <label class="form-check-label" for="teacher">Teacher</label>
                        </div>
                    @endif
                </div>
                <div class="mb-3 d-grid gap-2 col-6 mx-auto">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection