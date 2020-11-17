@include('template.template')
@yield('header')
<h1 class="h3 mb-2 text-gray-800">{{$heading}}</h1>
<p class="mb-4">Data from website {{$heading}}. You can export this data to Excel files or Google Spreadsheet data.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">DataTables Example</h6>
        <a href="/project/daihatsu-leads/export/{{$nameProject}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right ml-3"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report Excel</a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right ml-3"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report GSheet</a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                @for($i = 0; $i < count((array)$dataTable[0]); $i++)
                    <?php 
                        $array = (array)$dataTable[0];
                        $keys = array_keys($array);
                        // echo $keys[0];
                    ?>
                    <th>{{$keys[$i]}}</th>
                @endfor
                @foreach ($dataTable as $key => $item)
                    @foreach ($item as $key2 => $item2)
                    @endforeach
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTable as $key => $item)
                <tr>
                    @foreach ($item as $key2 => $item2)
                        <th>{{$item->$key2}}</th>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>

@yield('footer')