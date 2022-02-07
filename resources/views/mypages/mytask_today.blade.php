<!-- マイタスクページ(1)-->

@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="display:flex">
        
        <!-- サイドバー -->
        <div class="col-md-2">
            <div class="list-group">
              <h3>Mypage</h3>
              <a href="/mypage/mytask/today" class="list-group-item list-group-item-action active" aria-current="true"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mytask.svg">マイタスク</a>
              <a href="/mypage/labtask" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtask.svg">ラボタスク</a>
              <a href="/mypage/calendar" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/calendar.svg">カレンダー</a>
              <a href="/mypage/statistic" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/statistic.svg">統計</a>
            </div><br>
            <div class="list-group">
              <h3>Labpage</h3>
              <a href="/labpage/top" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtop.svg">ラボページ</a>
              <div class="dropdown">
                  <a class="list-group-item list-group-item-action dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/member.svg">メンバー
                  </a>
                
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($users as $user)
                      <li><a class="dropdown-item" href="/labpage/membertask/{{ $user->id }}"><img src="{{ $user->icon }}" style="width:30px; height:30px; border-radius:50%; object-fit:cover; border:solid; color:black;">{{ $user->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              <a href="/labpage/mention" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mention.svg">メンション</a>
              <a href="/labpage/ranking" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/ranking.svg">ランキング</a>
            </div>
        </div>
        
        <!-- フィルター -->
        <div class="col-md-2" style="margin:10px;">
            <div class="list-group list-group-flush">
              <h4>Labtask</h4>
              @foreach($labtasks as $labtask)
                <a href="/mypage/mytask/bylabtask/{{ $labtask->id }}" class="list-group-item list-group-item-action">
                  {{ $labtask->title }}
                </a>
              @endforeach
            </div><br>
            <div class="list-group list-group-flush">
              <h4>Due Date</h4>
              <a href="/mypage/mytask/today" class="list-group-item list-group-item-action active">Today</a>
              <a href="/mypage/mytask/tomorrow" class="list-group-item list-group-item-action">Tomorrow</a>
              <a href="/mypage/mytask/thisweek" class="list-group-item list-group-item-action">This Week</a>
              <a href="/mypage/mytask/thismonth" class="list-group-item list-group-item-action">This Month</a>
            </div>
        </div>
        
        <!-- Todoリスト -->
        <div class="col-md-7">
            <h1>Mytask -Today</h1>
            
            <!-- 新規作成 -->
            <div class="card" style="margin:10px;">
                <div class="card-header">
                  Create a new task
                </div>
                <form class="row g-2" action="/mypage/mytask/today" method="POST" style="margin:10px;">
                  @csrf
                  <div class="col-md-11">
                    <label for="title" class="visually-hidden">title</label>
                    <input type="text" name="mytask[title]" class="form-control" id="title" placeholder="Title"  value="{{ old('mytask.title') }}">
                    <p style="color:red">{{ $errors->first('mytask.title') }}</p>
                  </div>
                  <div class="col-md-9">
                      <select class="form-select" name="mytask[labtask_id]">
                          <option value="" disabled selected style="display:none;">Related Labtask</option>
                          @foreach($labtasks as $labtask)
                            <option value="{{ $labtask->id }}">{{ $labtask->title }}</option>
                          @endforeach
                        </select>
                        <p style="color:red">{{ $errors->first('labtask_id') }}</p>
                  </div>
                  <input type="hidden" name="mytask[will_finish_on]" value="{{ \Carbon\Carbon::today() }}">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mb-3">Create</button>
                  </div>
                </form>
            </div><br>
            
            <div class="mytask_list" style="margin:5px;">
                
                <div class="todo">
                    <h2>Todo</h2>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Title</th>
                          <th scope="col">Related Labtask</th>
                          <th scope="col">Due Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($mytasks_todo as $mytask)
                            @if($mytask->labtask->user_id == Auth::user()->id)
                                <tr>
                                  <td>
                                    <div class="form-check">
                                      <form action="/mypage/mytask/today/{{ $mytask->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input class="form-check-input" type="checkbox" name="mytask[task_state]" value=2 onChange='submit();'>
                                      </form>
                                    </div>
                                  </th>
                                  <td><a href="/mypage/mytask/today/{{ $mytask->id }}">{{ $mytask->title }}</a></td>
                                  <td>{{ $mytask->labtask->title }}</td>
                                  <td>{{ $mytask->will_finish_on }}</td>
                                </tr>
                            @endif
                        @endforeach
                      </tbody>
                    </table>
                </div><br>
                
                <div class="completed">
                    <h2>Completed</h2>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Title</th>
                          <th scope="col">Related Labtask</th>
                          <th scope="col">Due Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($mytasks_completed as $mytask)
                            @if($mytask->labtask->user_id == Auth::user()->id)
                                <tr>
                                  <td>
                                    <div class="form-check">
                                      <form action="/mypage/mytask/today/{{ $mytask->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input class="form-check-input" type="checkbox" name="mytask[task_state]" value=0 onChange='submit();'>
                                      </form>
                                    </div>
                                  </th>
                                  <td><a href="/mypage/mytask/today/{{ $mytask->id }}">{{ $mytask->title }}</a></td>
                                  <td>{{ $mytask->labtask->title }}</td>
                                  <td>{{ $mytask->will_finish_on }}</td>
                                </tr>
                            @endif
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
@endsection