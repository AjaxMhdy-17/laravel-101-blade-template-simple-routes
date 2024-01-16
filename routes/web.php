<?php

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
];




Route::get('/tasks',function() use($tasks) {
    return view('tasks',[
        'tasks' => $tasks
    ]);
})->name('tasks.index');



Route::get('/task/{id}',function($id) use($tasks) {
    $task = collect($tasks)->firstWhere('id',$id);

    if(!$task){
        abort(HttpResponse::HTTP_NOT_FOUND);
    }

    return view('single',['task' => $task]) ; 

})->name('tasks.show');


Route::get('/greeting' , function(){
    return "hello laravel" ; 
});

Route::get('/example/{id?}', function () {
    return view('ex',[
        'name' => 'mhdy',
        'post' => 'developer',
        'id' => 1 ,
        'students' => ['student-1','student-2','student-3','student-4','student-5']
    ]);
});


Route::group(["prefix" => "mhdy"], function(){
    Route::get('/first',function(){
        return "from first";
    });
    Route::get('/second',function(){
        return "from second";
    });
    Route::get('/third',function(){
        return "from third";
    });
});





Route::fallback(function(){
    return "This is 404 page" ; 
});


