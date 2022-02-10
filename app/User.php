<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lab_id',
        'icon',
        'student_or_not',
        'thema',
        'background',
        'motivation',
        'object',
        'github_account',
        'timer_mode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    //データ取得制限
    public function getLabtaskTodoByUser()
    {
        return $this->labtasks()->with('user')->where('is_done', 0)->orderBy('created_at', 'ASC')->get();
    }
    public function getLabtaskCompletedByUser()
    {
        return $this->labtasks()->with('user')->where('is_done', 1)->orderBy('updated_at', 'DESC')->limit(10)->get();
    }
    
    public function getByUserForComment()
    {
        return $this->comments()->with('user')->orderBy('created_at', 'DESC')->get();
    }
    
    public function getByMACD()
    {
        return $this::with(['labtasks' => function($query){
            $query->with('mytasks');
        }])->get();
        // return $this::with('labtask')->where('task_state', 2)->whereDate('updated_at', '>=', Carbon::today())->count();
    }
    
    // public function labtasksRanking()
    // {
    //     $query = User::withCount(['labtasks' => function (Builder $query) {
    //         $query->where('is_done', 1)->whereDate('updated_at', '>=', Carbon::now()->subWeek());
    //     }])->orderBy('labtasks_count', 'DESC')->limit(3)->get();
    // }
    
    
    public function mytaskTodayRanking()
    {
        $users = $this::with(['labtasks' => function ($query) {
            $query->withCount(['mytasks' => function ($query) {
                $query->where('task_state', 2)->whereDate('updated_at', '>=', Carbon::today());
            }])->orderBy('mytasks_count', 'DESC');
        }])->limit(3)->get();
        
        foreach($users as $user) {
            $mytasks_count = 0;
            foreach($user->labtasks as $labtask) {
                $mytasks_count += $labtask->mytasks_count;
            }
            $data = [
                'name' => $user->name,
                'mytasks_count' => $mytasks_count,
            ];
            $mytask_data[] = $data;
        }
        foreach((array) $mytask_data as $key => $value)
        {
            $sort[$key] = $value['mytasks_count'];
        }
        array_multisort($sort, SORT_DESC, $mytask_data);
        return $mytask_data;
    }
    public function mytaskWeekRanking()
    {
        $users = $this::with(['labtasks' => function ($query) {
            $query->withCount(['mytasks' => function ($query) {
                $query->where('task_state', 2)->whereDate('updated_at', '>=', Carbon::now()->subWeek());
            }])->orderBy('mytasks_count', 'DESC');
        }])->limit(3)->get();
        
        foreach($users as $user) {
            $mytasks_count = 0;
            foreach($user->labtasks as $labtask) {
                $mytasks_count += $labtask->mytasks_count;
            }
            $data = [
                'name' => $user->name,
                'mytasks_count' => $mytasks_count,
            ];
            $mytask_data[] = $data;
        }
        foreach((array) $mytask_data as $key => $value)
        {
            $sort[$key] = $value['mytasks_count'];
        }
        array_multisort($sort, SORT_DESC, $mytask_data);
        return $mytask_data;
    }
    public function mytaskMonthRanking()
    {
        $users = $this::with(['labtasks' => function ($query) {
            $query->withCount(['mytasks' => function ($query) {
                $query->where('task_state', 2)->whereDate('updated_at', '>=', Carbon::now()->subMonth());
            }])->orderBy('mytasks_count', 'DESC');
        }])->limit(3)->get();
        
        foreach($users as $user) {
            $mytasks_count = 0;
            foreach($user->labtasks as $labtask) {
                $mytasks_count += $labtask->mytasks_count;
            }
            $data = [
                'name' => $user->name,
                'mytasks_count' => $mytasks_count,
            ];
            $mytask_data[] = $data;
        }
        foreach((array) $mytask_data as $key => $value)
        {
            $sort[$key] = $value['mytasks_count'];
        }
        array_multisort($sort, SORT_DESC, $mytask_data);
        return $mytask_data;
    }
    
    public function labtasksTodayRanking()
    {
        $users = $this::withCount(['labtasks' => function ($query) {
            $query->where('is_done', 1)->whereDate('updated_at', '>=', Carbon::today());
        }])->orderBy('labtasks_count', 'DESC')->limit(3)->get();
        return $users;
    }
    public function labtasksThisweekRanking()
    {
        $users = $this::withCount(['labtasks' => function ($query) {
            $query->where('is_done', 1)->whereDate('updated_at', '>=', Carbon::now()->subWeek());
        }])->orderBy('labtasks_count', 'DESC')->limit(3)->get();
        return $users;
    }
    public function labtasksThismonthRanking()
    {
        $users = $this::withCount(['labtasks' => function ($query) {
            $query->where('is_done', 1)->whereDate('updated_at', '>=', Carbon::now()->subMonth());
        }])->orderBy('labtasks_count', 'DESC')->limit(3)->get();
        return $users;
    }
    
    
    
    //リレーション
    public function lab()
    {
        return $this->belongsTo('App\Lab');
    }
    
    public function labtasks()
    {
        return $this->hasMany('App\Labtask');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function lt_favorites()
    {
        return $this->belongsToMany(Labtask::class, 'ltfavorites', 'user_id', 'labtask_id')->withTimestamps();
    }
    
    public function c_favorites()
    {
        return $this->belongsToMany(Comment::class, 'cfavorites', 'user_id', 'comment_id')->withTimestamps();
    }
    
    //いいね機能
    public function lt_favorite($labtaskId)
    {
        $exist = $this->is_lt_favorite($labtaskId);
        
        if($exist){
            return false;
        }else{
            $this->lt_favorites()->attach($labtaskId);
            return true;
        }
    }
    public function lt_unfavorite($labtaskId)
    {
        $exist = $this->is_lt_favorite($labtaskId);
        
        if($exist){
            $this->lt_favorites()->detach($labtaskId);
            return true;
        }else{
            return false;
        }
    }
    public function is_lt_favorite($labtaskId)
    {
        return $this->lt_favorites()->where('labtask_id', $labtaskId)->exists();
    }
    
    public function c_favorite($commentId)
    {
        $exist = $this->is_c_favorite($commentId);
        
        if($exist){
            return false;
        }else{
            $this->c_favorites()->attach($commentId);
            return true;
        }
    }
    public function c_unfavorite($commentId)
    {
        $exist = $this->is_c_favorite($commentId);
        
        if($exist){
            $this->c_favorites()->detach($commentId);
            return true;
        }else{
            return false;
        }
    }
    public function is_c_favorite($commentId)
    {
        return $this->c_favorites()->where('comment_id', $commentId)->exists();
    }
}
