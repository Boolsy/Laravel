<?php


    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CourseController;
    use App\Http\Controllers\HomeController;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\Auth\LoginController;

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


    Route::get('/course', [CourseController::class, 'index'])->name('course');

    Auth::routes();



    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/', [HomeController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');

    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');


    Route::POST('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');


    Route::get('/profile/export', [ProfileController::class, 'export'])->name('profile.export');

    Route::group(['middleware' => ['auth', 'admin:admin']], function () {

        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        Route::post('/admin/update/{user}', [AdminController::class, 'updateUser'])->name('admin.update');

        Route::get('/admin/edit/{user}', [AdminController::class, 'edit'])->name('admin.edit');

        Route::get('admin/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete');
    });







