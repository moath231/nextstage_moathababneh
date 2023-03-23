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
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">name</th>
                  <th scope="col">email</th>
                  <th scope="col">logo</th>
                  <th scope="col">website</th>
                  <th scope="col">button</th>
                </tr>
              </thead>
              <tbody>
                @if (count($companies) > 0)
                  @foreach ($companies as $company)
                    <tr>
                      <th scope="row">{{ $company->id }}</th>
                      <td>{{ $company->name }}</td>
                      <td>{{ $company->email }}</td>
                      <td>
                        <img src="{{ asset($company->logo) }}" alt="" width="40">
                      </td>
                      <td>{{ $company->website }}</td>
                      <td>
                        <a href="/admin/companyadmin/{{ $company->id }}/edit" type="button" class="btn btn-info">edit</a>
                        <form action="/admin/companyadmin/{{ $company->id }}" method="post">
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
            {{ $companies->links('pagination::bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>
