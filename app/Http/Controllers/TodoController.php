<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index() {
        // ローカルスコープを呼び出すときは第一引数の$queryを省略する。いれてはいけない。
        $runningItems = Todo::flg(1)->get();
        $doneItems = Todo::flg(0)->get();

        return view('todo', compact('runningItems', 'doneItems'));
    }

    public function store(Request $request) {
        $this->validate($request, Todo::$rules);

        $todo = new Todo;
        $form = $request->all();
        unset($form['_token']);
        $form['flg'] = 1;
        $todo->fill($form)->save();

        return redirect('/todo');
    }

    public function update(Request $request) {
        $todo = Todo::find($request->id);
        $todo->flg = 0;
        $todo->save();

        return redirect('/todo');
    }

    public function delete(Request $request) {
        Todo::find($request->id)->delete();

        return redirect('/todo');
    }
}
