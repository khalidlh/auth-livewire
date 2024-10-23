<div>
    <div class="progress mb-4">
        <div class="progress-bar" role="progressbar" style="width: {{ $step * 33.33 }}%;"
            aria-valuenow="{{ $step }}" aria-valuemin="1" aria-valuemax="3">{{ $step }}/3</div>
    </div>

    <!-- Step 1: Personal Information -->
    @if ($step == 1)
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <i class="fas fa-user"></i> Personal Information
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" id="name" class="form-control" wire:model="personalInfo.name" placeholder="Enter your full name">
                    </div>
                    @error('personalInfo.name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <div class="input-group  mb-3">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" id="email" class="form-control" wire:model="personalInfo.email"
                            placeholder="Enter your email">
                    </div>
                    @error('personalInfo.email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="phone">Phone Number</label>
                    <div class="input-group mb-3">
                        
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                     
                        <input type="text" id="phone" class="form-control" wire:model="personalInfo.phone"
                            placeholder="Enter your phone number">
                    </div>
                    @error('personalInfo.phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    @endif

    <!-- Step 2: Academic Information -->
    @if ($step == 2)
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <i class="fas fa-graduation-cap"></i> Academic Information
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="school_name">School Name</label>
                    <div class="input-group mb-3">
                        
                            <span class="input-group-text"><i class="fas fa-school"></i></span>
                       
                        <input type="text" id="school_name" class="form-control" wire:model="schoolInfo.school_name"
                            placeholder="Enter your school name">
                    </div>
                    @error('schoolInfo.school_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="degree">Degree</label>
                    <div class="input-group mb-3">
                        
                            <span class="input-group-text"><i class="fas fa-certificate"></i></span>
                      
                        <input type="text" id="degree" class="form-control" wire:model="schoolInfo.degree"
                            placeholder="Enter your degree">
                    </div>
                    @error('schoolInfo.degree')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="graduation_year">Graduation Year</label>
                    <div class="input-group mb-3">
                        
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        
                        <input type="number" id="graduation_year" class="form-control"
                            wire:model="schoolInfo.graduation_year" placeholder="Enter your graduation year">
                    </div>
                    @error('schoolInfo.graduation_year')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    @endif

    <!-- Step 3: Accept Terms -->
    @if ($step == 3)
        <div class="card shadow">
            <div class="card-header bg-warning text-white text-center">
                <i class="fas fa-file-contract"></i> Terms and Conditions
            </div>
            <div class="card-body">
                <div class="form-group mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="terms" wire:model="termsAccepted">
                        <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
                    </div>
                    @error('termsAccepted')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    @endif

    <!-- Navigation Buttons -->
    <div class="d-flex justify-content-between mt-4">
        @if ($step > 1)
            <button class="btn btn-secondary" wire:click="previousStep">Previous</button>
        @endif

        @if ($step < 3)
            <button class="btn btn-primary" wire:click="nextStep">Next</button>
        @else
            <button class="btn btn-success" wire:click="submit">Submit</button>
        @endif
    </div>
</div>
