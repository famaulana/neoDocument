@include('template.template')
@yield('header')
<h1 class="h3 mb-2 text-gray-800">{{$heading}}</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">DataTables Example</h6>
        <a href="/project/daihatsu-leads/export" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right ml-3"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report Excel</a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right ml-3"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report GSheet</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Car</th>
                <th>Province</th>
                <th>City</th>
                <th>Dealer</th>
                <th>Plan</th>
                <th>Offering Info</th>
                <th>Url</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTable as $key => $item)
                <tr>
                    {{-- <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th>
                    <th>{{$item->$nameTable[$key]->COLUMN_NAME}}</th> --}}
                    <th>{{$item->id}}</th>
                    <th>{{$item->name}}</th>
                    <th>{{$item->telp}}</th>
                    <th>{{$item->email}}</th>
                    <th>{{$item->car}}</th>
                    <th>{{$item->province}}</th>
                    <th>{{$item->city}}</th>
                    <th>{{$item->dealer}}</th>
                    <th>{{$item->plan}}</th>
                    <th>{{$item->offering_info}}</th>
                    <th>{{$item->url}}</th>
                    <th>{{$item->created_at}}</th>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>

@yield('footer')