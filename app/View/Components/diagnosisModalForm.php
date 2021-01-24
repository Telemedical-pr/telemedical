<?php

namespace App\View\Components;

use Illuminate\View\Component;

class diagnosisModalForm extends Component
{
    public $value;
    public bool $edit=false;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value, $edit)
    {
        $this->value = $value;
        $this->edit = $edit;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.diagnosis-modal-form');
    }
}
