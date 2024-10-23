<?php

namespace App\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MultiStepForm extends Component
{
    use LivewireAlert; // Use SweetAlert

    public $step = 1; // Tracks the current step

    // Store the form data
    public $personalInfo = [
        'name' => '',
        'email' => '',
        'phone' => '',
    ];

    public $schoolInfo = [
        'school_name' => '',
        'degree' => '',
        'graduation_year' => '',
    ];

    public $termsAccepted = false; // For the terms and conditions

    // Validation rules
    protected $rules = [
        'personalInfo.name' => 'required|string',
        'personalInfo.email' => 'required|email',
        'personalInfo.phone' => 'required',
        'schoolInfo.school_name' => 'required|string',
        'schoolInfo.degree' => 'required|string',
        'schoolInfo.graduation_year' => 'required|numeric',
        'termsAccepted' => 'accepted',
    ];

    // Move to the next step
    public function nextStep()
    {
        if ($this->step == 1) {
            $this->validate([
                'personalInfo.name' => 'required|string',
                'personalInfo.email' => 'required|email',
                'personalInfo.phone' => 'required',
            ]);
        }

        if ($this->step == 2) {
            $this->validate([
                'schoolInfo.school_name' => 'required|string',
                'schoolInfo.degree' => 'required|string',
                'schoolInfo.graduation_year' => 'required|numeric',
            ]);
        }

        $this->step++;
    }

    // Move to the previous step
    public function previousStep()
    {
        $this->step--;
    }

    // Submit the form
    public function submit()
    {
        // Validate all fields
        $this->validate();

        // Logic to save the data or process the form

        // Show SweetAlert on successful submission
        $this->alert('success', 'Form submitted successfully!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Thank you for completing the form.',
            'showCancelButton' => false,
        ]);

        // Optionally reset the form and step after submission
        $this->reset();
        $this->step = 1;
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }
}
