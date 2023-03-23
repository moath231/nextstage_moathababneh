<x-layout>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>
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

            @if(session('destroy'))
              <div style="background-color: rgba(128, 0, 0, 0.185); padding:20px;">
                  <span style="color: red">{{ session('destroy') }}</span>
              </div>
            @endif

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First name</th>
                  <th scope="col">Last name</th>
                  <th scope="col">company</th>
                  <th scope="col">email</th>
                  <th scope="col">phone</th>
                  <th scope="col">button</th>
                </tr>
              </thead>
              <tbody>

                @if (count($employees) > 0)
                  @foreach ($employees as $employee)
                    <tr>
                      <th scope="row">{{ $employee->id }}</th>
                      <td>{{ $employee->firstname }}</td>
                      <td>{{ $employee->lastname }}</td>
                      <td>{{ $employee->company->name }}</td>
                      <td>{{ $employee->email }}</td>
                      <td>{{ $employee->phone }}</td>
                      <td>
                        <a href="/admin/employeeadmin/{{ $employee->id }}/edit" type="button" class="btn btn-info">edit</a>
                        <form action="/admin/employeeadmin/{{ $employee->id }}" method="post">
                          @csrf
                          @method("DELETE")
                          <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
            {{ $employees->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>
