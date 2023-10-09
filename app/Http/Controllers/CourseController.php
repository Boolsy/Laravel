<?php


    namespace App\Http\Controllers;

    use App\Models\Course;


    class CourseController extends Controller
    {   //cette méthode affiche la liste de tous les cours
        public function index()
        {
            //récupère tous les cours depuis la db
            $courses = Course::all();
            //Passe les cours à la vue 'course.index' en tant que données, avec la clé 'courses' pour y accéder dans la vue.
            return view('course.index', ['courses' => $courses]);
        }
    }
