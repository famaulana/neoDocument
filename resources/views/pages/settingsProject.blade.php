@include('template.template')
@yield('header')
<h1 class="h3 mb-2 text-gray-800">{{$heading}}</h1>
<p class="mb-4">Data from website {{$heading}}. You can export this data to Excel files or Google Spreadsheet data.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">DataTables Example</h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="width:90%">Project Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project as $item)
                <tr>
                    <th>{{$item}}</th>
                    <th>
                        <button class="btn btn-info mr-2"><span class="fas fa-fw fa-align-right"></span></button>
                        <button class="btn btn-danger mr-2 btn-delete" data-toggle="modal" data-target="#deleteModal" item="{{$item}}"><span class="fas fa-fw fa-times"></span></button>
                    </th>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">Are you sure to delete this data permanent?</div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-danger btn-modal-delete" href="/project/delete/{{$item}}">Delete</a>
    </div>
    </div>
</div>
</div>


@yield('footer')