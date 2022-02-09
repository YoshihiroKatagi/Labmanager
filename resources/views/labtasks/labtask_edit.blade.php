<!--ラボタスク詳細ページ(15)-->

@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="display:flex;">
        
        <!-- サイドバー -->
        <div class="col-md-2">
            <div class="list-group">
              <h3>Mypage</h3>
              <a href="/mypage/mytask/today" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mytask.svg">マイタスク</a>
              <a href="/mypage/labtask" class="list-group-item list-group-item-action active" aria-current="true"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/labtask.svg">ラボタスク</a>
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
                      <li><a class="dropdown-item" href="/labpage/membertask/{{ $user->id }}"><img src="{{ $user->icon }}" style="width:30px; height:30px; border-radius:50%; object-fit:cover; border:solid; border-width:thin; color:black;">{{ $user->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              <a href="/labpage/mention" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/mention.svg">メンション</a>
              <a href="/labpage/ranking" class="list-group-item list-group-item-action"><img src="https://labmanager-backet.s3.ap-northeast-1.amazonaws.com/app_icon/ranking.svg">ランキング</a>
            </div>
        </div>
        
        <!-- Labtask一覧 -->
        <div class="col-md-6" style="">
          <div class="row">
            
            <div class="col-md-1">
            </div>
            <div class="col-md-11">
              <h1>My Labtask</h1>
              
              <!-- 新規作成 -->
              <div class="card col-md-10 m-4">
                  <div class="card-header">
                    Create a new Labtask
                  </div>
                  <form class="row g-2" action="/mypage/labtask/create" method="POST" style="margin:10px;">
                    @csrf
                    <div class="col-md-11">
                      <input type="hidden" name="labtask[user_id]" value="{{ Auth::user()->id }}">
                      <label for="title" class="visually-hidden">title</label>
                      <input type="text" name="labtask[title]" class="form-control" id="title" placeholder="Title"  value="{{ old('labtask.title') }}">
                      <p style="color:red">{{ $errors->first('labtask.title') }}</p>
                    </div>
                    <div class="col-md-8">
                      <label for="description" class="visually-hidden">Description</label>
                      <textarea class="form-control" name="labtask[description]" placeholder="description about this task..." id="description" style="height: 80px">{{ old('labtask[description]') }}</textarea>
                      <p style="color:red">{{ $errors->first('labtask.description') }}</p>
                    </div>
                    <div class="col-md-2" style="margin-left:auto; margin-top:auto;">
                      <button type="submit" class="btn btn-primary mb-3">Create</button>
                    </div>
                  </form>
              </div><br>
              
              
              <!-- 一覧 -->
              <div>
                <h2>Todo</h2>
                <div>
                  @foreach($labtasks as $labtask)
                    @if($labtask->is_done == 0)
                        <div  class="card col-md-7 m-2 mx-auto">
                            <div class="card-body">
                              <div style="display:flex;">
                                <div class="form-check"  style="text-align:left">
                                  <form action="/mypage/labtask/{{ $labtask->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input class="form-check-input" id="is_done" type="checkbox" name="labtask[is_done]" value=1 onChange='submit();'>
                                    <label class="form-check-label" for="is_done">DONE!</label>
                                  </form>
                                </div>
                                <div style="margin-left:auto;">
                                  <p>{{ $labtask->created_at->format('Y年m月d日') }}</p>
                                </div>
                              </div>
                              <div style="text-align:center;">
                                <h2 class="card-title"><a href="/mypage/labtask/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                                <div>Good: 
                                    <span class="badge bg-primary">{{ $labtask->is_liked }}</span>
                                </div>
                              </div>
                            </div>
                        </div>
                    @endif
                  @endforeach
                  <br>
                </div>
              </div><br>
              
              <div>
                <h2>Completed</h2>
                <div>
                  @foreach($labtasks as $labtask)
                    @if($labtask->is_done == 1)
                        <div  class="card col-md-7 m-2 mx-auto">
                            <div class="card-body">
                              <div style="display:flex;">
                                <div class="form-check"  style="text-align:left">
                                  <form action="/mypage/labtask/{{ $labtask->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input class="form-check-input" id="is_done" type="checkbox" name="labtask[is_done]" value=0 onChange='submit();'>
                                    <label class="form-check-label" for="is_done">Back todo</label>
                                  </form>
                                </div>
                                <div style="margin-left:auto;">
                                  <p>{{ $labtask->created_at->format('Y年m月d日') }}</p>
                                </div>
                              </div>
                              <div style="text-align:center;">
                                <h2 class="card-title"><a href="/mypage/labtask/{{ $labtask->id }}">{{ $labtask->title }}</a></h2>
                                <div>Good: 
                                    <span class="badge bg-primary">{{ $labtask->is_liked }}</span>
                                </div>
                              </div>
                            </div>
                        </div>
                    @endif
                  @endforeach
                  <br>
                </div>
              </div><br>
              
              <div class="card col-md-11 m-5 p-3">
                  <h2>研究概要</h2>
                  <h5>Theme: {{ Auth::user()->thema }}</h5>
                  <h6>Background: {{ Auth::user()->background }}</h6>
                  <h6>Object: {{ Auth::user()->motivation }}</h6>
                  <h6>Goal: {{ Auth::user()->object }}</h6>
                  <h6><a href="/setting/outline">編集</a></h6>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Labtask詳細 -->
        <div class="col-md-4 m-2">
          <h1 style="margin-left:15px;">Detail & Edit</h1>
          <div class="card m-3 p-3">
              <div style="display:flex;">
                <button type="button" class="btn-close" aria-label="Close" onclick="location.href='/mypage/labtask'"></button>
                <div style="margin-left:auto;">
                    <p>{{ $Labtask->created_at->format('Y年m月d日') }}</p>
                </div>
              </div>
              <div style="text-align:right;">
                  <h5><a href="/labpage/membertask/{{ Auth::user()->id }}/{{ $Labtask->id }}/comment">Check commments</a></h5>
              </div>
              <form action="/mypage/labtask/{{ $Labtask->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="task state" name="labtask[is_done]" value=1 onChange='submit();'>
                  <label class="form-check-label" for="task state">DONE!</label>
                </div>
                <div style="text-align:center;">Good: 
                  <span class="badge bg-primary">{{ $Labtask->is_liked }}</span>
              </div>
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="labtask[title]" value="{{ $Labtask->title }}">
                </div>
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" name="labtask[description]" placeholder="description about this task..." id="description" style="height: 100px">{{ $Labtask->description }}</textarea>
                </div>
                <div class="mb-3 d-grid gap-2">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
              
              <!-- Button trigger modal -->
              <div class="delete-button">
                <form action="/mypage/labtask/{{ $Labtask->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div style="text-align:right;">
                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete
                      </button>
                    </div>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-body">
                            Are you sure to delete?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </div>
                        </div>
                      </div>
                    </div>
                </form>
                <label for="Figures" class="form-label">Figures</label>
                <div style="text-align:center;" id="Figures">
                  @foreach($images as $image)
                    <div class="mb-2">
                      <figure class="figure">
                        <img src="{{ $image->image_path }}" style="width:15vw;">
                        <form action="/mypage/labtask/{{ $Labtask->id }}/{{ $image->id }}" method="POST">
                          @csrf
                          @method('PUT')
                          <figcaption><textarea class="form-control m-1" name="image[description]" placeholder="descrive about this figure...">{{ $image->description }}</textarea></figcaption>
                          <div class="d-grid gap-2 col-6 mx-auto m-1">
                            <button class="btn btn-secondary btn-sm" type="submit">Save</button>
                          </div>
                        </form>
                        <form action="/mypage/labtask/{{ $Labtask->id }}/{{ $image->id }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                          </div>
                        </form>
                      </figure>
                    </div>
                  @endforeach
                </div>
                <div class="mb-5">
                  <form action="/mypage/labtask/{{ $Labtask->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control form-control-sm" type="file" name="image">
                    <div style="text-align:right;">
                      
                    <input class="btn btn-secondary btn-sm mt-1" type="submit" value="Upload">
                    </div>
                  </form>
                </div>
            </div>
        </div>
    
    </div>
@endsection