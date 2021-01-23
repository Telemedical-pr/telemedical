
<div class="card">
    <div class="card-header bg-dark">
        <h2 class="text-center">Add New Doctor</h2>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('doctors.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>
            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                <div class="col-md-6">
                    <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="specialization" class="col-md-4 col-form-label text-md-right">{{ __('Specialization') }}</label>

                <div class="col-md-6">
                    <select id="specialization" class="form-control @error('specialization') is-invalid @enderror" name="specialization" value="{{ old('specialization') }}" required autocomplete="specialization" autofocus>
                        <x-specializations/>
                    </select>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="start_year" class="col-md-4 col-form-label text-md-right">{{ __('First Year of Practice') }}</label>

                <div class="col-md-6">
                    <input type="number" name="start_year" id="start_year" class="form-control">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="institution" class="col-md-4 col-form-label text-md-right">{{ __('Current Intitution of Practice') }}</label>

                <div class="col-md-6">
                    <input type="text" name="institution" id="institution" class="form-control">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __("Doctor's Profile Image") }}</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                </div>

                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
