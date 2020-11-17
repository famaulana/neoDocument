@include('template.template')
@yield('header')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left">Add Project</h6>
    </div>
    <div class="card-body">
        <form action="/project/add/proccess" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-3 float-left">
                    <p class="m-auto">Name Project</p>
                </div>
                <div class="col-9 float-left">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="*myProject" name="name" aria-label="Search" aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3 float-left">
                    <p class="m-auto">Database</p>
                </div>
                <div class="col-9 float-left">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="*myProject_DB" name="database" aria-label="Search" aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3 float-left">
                    <p class="m-auto">Table Name</p>
                </div>
                <div class="col-9 float-left">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="*tbl_user_data" name="table" aria-label="Search" aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3 float-left">
                    <p class="m-auto">Host</p>
                </div>
                <div class="col-9 float-left">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="*localhost/ip(169.168.29.0)/www.myproject.com" name="host" aria-label="Search" aria-describedby="basic-addon2">
                    </div>
                </div>
            </div>
            <div class="row d-inline">
                <div class="m-2 float-right">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="m-2 float-right">
                    <button type="reset" class="btn btn-danger">Clear</button>
                </div>
            </div>
        </form>
    </div>
</div>

@yield('footer')