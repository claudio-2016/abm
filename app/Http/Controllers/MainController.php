<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class MainController extends Controller
{
    static function index() {
        $note = new Note;
        return view('abm_home', ['notas' => $note->get()]);
    }

    static function store(Request $r) {
        $note = new Note;
        if($r->flag == 0) {
            $note->title = $r->titulo;
            $note->note = (is_null($r->texto)) ? '' : $r->texto;
            $note->save();
        } else {
            $swapNote = $note->find($r->flag);
            $swapNote->title = $r->titulo;
            $swapNote->note = (is_null($r->texto)) ? '' : $r->texto;
            $swapNote->save();
        }
        return redirect()->route('home');
    }

    static function reseTable() {
        $note = new Note;
        $note->truncate();
        return redirect()->route('home');
    }

    static function show(Request $r) {
        $note = new Note;
        return $note->find($r->flag)->note;
    }

    static function delete(Request $r) {
        $note = new Note;
        $note->find($r->flag)->delete();
        return 1;
    }
}
