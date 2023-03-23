<x-layout>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('company Dashboard') }}</div>
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

            <form method="post" action="/admin/companyadmin/{{ $company->id }}" enctype="multipart/form-data">
              @csrf
              @method("PATCH")
              <div class="form-group mt-3">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="name" name="name" value="{{ $company->name }}">
                @error('name')
                  <span style="color:red">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group mt-3">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{ $company->email }}">
                @error('email')
                  <span style="color:red">{{ $message }}</span>
                @enderror
              </div>

                <div class="form-group mt-3">
                  <label for="logo">upload logo</label><br>
                  <input type="file" class="form-control-file" id="logo" name="logo">
                  @error('logo')
                    <span style="color:red">{{ $message }}</span>
                  @enderror
                </div>

              <div class="form-group mt-3">
                <label for="website">website</label>
                <input type="text" class="form-control" id="website" aria-describedby="website" placeholder="website" name="website" value="{{ $company->website }}">
                @error('website')
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
