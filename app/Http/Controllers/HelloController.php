<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        $user = 'Slavo';
        $whatever = 'Slavo';
        $comment = '<script>window.location="http://google.com"</script>';
        $description = 'This is a <strong>great product</strong>!';
        $fruits = ['apple', 'pear', 'plum'];
        $age = 17;

//        return view('sub/hello-view')
//            ->with('whatever', $user)
//            ->with('age', $age);

//        return view('sub/hello-view', [
//            'whatever' => $user,
//            'age' => $age
//        ]);

//        return view('sub/hello-view', [
//            'whatever' => $whatever,
//            'age' => $age
//        ]);

//        return compact('whatever', 'age');

        // this one works only if we don't want to rename variables from controller to view
        return view('sub/hello-view', compact('whatever', 'age', 'comment', 'description', 'fruits'));
    }
}
