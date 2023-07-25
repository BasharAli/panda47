<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Translation;

class Translations extends Component
{
    public $en_locale;
    public $en_key;
    public $en_value;

    public $ar_locale;
    public $ar_key;
    public $ar_value;

    public $tr_locale;
    public $tr_key;
    public $tr_value;

    public $ru_locale;
    public $ru_key;
    public $ru_value;

    


    public function addEnTrans()
    {

        $trans = new Translation();
        $trans->locale = 'en';
        $trans->key = $this->en_key;
        $trans->value = $this->en_value;
        $trans->save();
        $this->reset();
    }

    public function addArTrans()
    {

        $trans = new Translation();
        $trans->locale = 'ar';
        $trans->key = $this->ar_key;
        $trans->value = $this->ar_value;
        $trans->save();
        $this->reset();
    }

    public function addTrTrans()
    {

        $trans = new Translation();
        $trans->locale = 'tr';
        $trans->key = $this->tr_key;
        $trans->value = $this->tr_value;
        $trans->save();
        $this->reset();
    }

    public function addRuTrans()
    {

        $trans = new Translation();
        $trans->locale = 'ru';
        $trans->key = $this->ru_key;
        $trans->value = $this->ru_value;
        $trans->save();
        $this->reset();
    }

   


    public function deleteTrans($trans_id)
    {
        $trans = Translation::find($trans_id);
        $trans->delete();

    }

    public function render()
    {
        $english = Translation::where('locale', 'en')->orderBy('created_at', 'desc')->get();
        $turkish = Translation::where('locale', 'tr')->orderBy('created_at', 'desc')->get();
        $arabic = Translation::where('locale', 'ar')->orderBy('created_at', 'desc')->get();
        $russian = Translation::where('locale', 'ru')->orderBy('created_at', 'desc')->get();



        return view('livewire.admin.translations', ['english' =>$english, 'turkish' => $turkish, 'arabic' => $arabic, 'russian' => $russian])->layout('layouts.admin');
    }
}
