<x-layout>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('employee Dashboard') }}</div>
          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            @if(session('success'))
              <div style="background-color: rgba(0, 128, 0, 0.185); padding:20px;">
                  <span style="color: green">{{ session('success') }}</span>
              </div>
            @endif

            <form method="post" action="/admin/employeeadmin" enctype="multipart/form-data">
              @csrf
              <div class="form-group mt-3">
                <label for="firstname">first name</label>
                <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="first name" name="firstname" value="{{ old('firstname') }}">
                @error('firstname')
                  <span style="color:red">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mt-3">
                <label for="lastname">last name</label>
                <input type="text" class="form-control" id="lastname" aria-describedby="lastname" placeholder="last name" name="lastname" value="{{ old('lastname') }}">
                @error('lastname')
                  <span style="color:red">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mt-3">
                <label for="">company</label>
                <select class="form-control" name="company"> 
                  <option disabled>select</option>
                  @if (count(App\Models\Company::all()) > 0)
                    @foreach (App\Models\Company::all() as $company)
                      <option value="{{ $company->id }}"  {{ $company->id == old('company') ? 'selected':'' }} >{{ $company->name }}</option>
                    @endforeach
                  @endif
                </select>
                @error('company')
                  <span style="color:red">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mt-3">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ old('email') }}">
                @error('email')
                  <span style="color:red">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mt-3">
                <label for="phone">phone</label>
                <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Enter phone" name="phone" value="{{ old('phone') }}">
                @error('phone')
                <span style="color:red">{{ $message }}</span>
                @enderror
              </div>
              
              <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>
