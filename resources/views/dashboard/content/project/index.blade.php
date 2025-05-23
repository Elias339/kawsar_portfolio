@extends('dashboard.app')
@section('main')

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="mt-5">
                    <div class="d-flex justify-content-start">
                        <h2>Project</h2>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddProjectModal">
                            Create Project
                        </button>
                    </div>
                </div>
                <div class="card-body mt-1 bg-light" id="show_project_info">
                    <h1 class="text-center text-secondary my-5">Loading.......</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Create project Modal -->
    <div class="modal fade" id="AddProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('project.store') }}" method="POST" id="add_project_form" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="project_id" class="form-label">Project Category</label>
                            <select class="form-select mb-4" name="project_category_id" id="project_category_id" aria-label="Default select example">
                                <option selected>Select Category</option>
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Project Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Project Name">
                            <div class="error-title mb-4"></div>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Project Title">
                            <div class="error-title mb-4"></div>
                        </div>

                        <div class="form-group">
                            <label for="title">Description</label>
                            <input type="text" class="form-control" name="description" id="description" placeholder="Project description">
                            <div class="error-title mb-4"></div>
                        </div>


                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image" >
                            <div class="error-image mb-4"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="add_project_btn">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Edit project Modal -->
    <div class="modal fade" id="EditProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('project.update') }}" method="POST" id="edit_project_form" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="project_id" id="project_id">
                    <input type="hidden" name="project_image" id="project_image">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="project_category_id" class="form-label">Project Category</label>
                            <select class="form-select mb-4" name="project_category_id" id="edit_project_category_id" aria-label="Default select example">

                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Project Name</label>
                            <input type="text" class="form-control" name="name" id="edit_name" placeholder="Project Name">
                            <div class="error-title mb-4"></div>
                        </div>

                        <div class="form-group">
                            <label for="edit_title">Title</label>
                            <input type="text" class="form-control" name="title" id="edit_title" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <label for="title">Description</label>
                            <input type="text" class="form-control" name="description" id="edit_description" placeholder="Project description">
                            <div class="error-title mb-4"></div>
                        </div>

                        <div class="form-group">
                            <label for="edit_status" class="form-label">Status</label>
                            <select name="status" id="edit_status" class="form-control">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="edit_image" >
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="update_project_btn">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@push('script')

    <script>
        $(function () {

            // Create
            $("#add_project_form").submit(function (event) {
                event.preventDefault();
                const formData = new FormData($("#add_project_form")[0]);


                $(".text-danger").remove();

                $(".error-image").empty();

                $("#add_project_btn").text('Adding...');

                $.ajax({
                    url: "{{route('project.store')}}",
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#AddProjectModal").modal('hide');
                            $("#add_project_form")[0].reset();
                            $("#add_project_btn").text('Add Project');

                            fetchProject();
                        }
                    },
                    error:function (err) {
                        let error = err.responseJSON;
                        $.each(error.errors,function (index,value) {
                            $(`.error-${index}`).append('<span class="text-danger">'+value+'</span>'+'<br>');
                            $("#add_project_btn").text('Add Project');
                        });
                    },

                });
            });

            // Fetch
            fetchProject();
            function fetchProject() {
                $.ajax({
                    url: '{{ route('project.fetch') }}',
                    method: 'get',
                    success: function (data) {
                        if (data.length > 0) {
                            var key = 0;
                            var output = '<table class="table align-middle table-striped table-bordered table-responsive">';
                            output += '<thead><tr class="text-center"><th>SL</th><th>Project Category</th><th>Name</th><th>Title</th><th>Description</th><th>Image</th><th>Status</th><th>Action</th></tr></thead><tbody>';

                            $.each(data, function (index,project) {
                                output += '<tr class="text-center">';
                                output += '<td>' + ++key + '</td>';
                                output += '<td>' + (project.project_category ? project.project_category.name : 'No Category') + '</td>';
                                output += '<td>' + project.name + '</td>';
                                output += '<td>' + project.title + '</td>';
                                output += '<td>' + project.description + '</td>';
                                output += '<td><img src="{{ asset('/') }}/' + project.image + '" width="40" class="img-thumbnail"></td>';
                                output += '<td>' + project.status + '</td>';
                                output += '<td class="btn-group">';
                                output += '<a href="#" id="' + project.id + '" class="btn btn-sm btn-primary projectEditIcon" data-bs-toggle="modal" data-bs-target="#EditProjectModal">Edit</a>';
                                output += '<a href="#" id="' + project.id + '" class="btn btn-sm btn-danger mx-1 projectDeleteIcon">Delete</a>';
                                output += '</td></tr>';
                            });

                            output += '</tbody></table>';
                            $('#show_project_info').html(output);
                        } else {
                            $('#show_project_info').html('<h1 class="text-center text-secondary my-5">No record in the database!</h1>');
                        }
                    },
                });
            }

            // Edit
            $(document).on('click','.projectEditIcon',function (e) {
                e.preventDefault();
                let id = $(this).attr('id');

                $.ajax({
                    url: '{{ route('project.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    } ,
                    success: function (response) {
                        $("#edit_project_category_id").val(response.project_category_id);
                        $("#edit_name").val(response.name);
                        $("#edit_title").val(response.title);
                        $("#edit_description").val(response.description);
                        $("#edit_image").attr('src', "{{ asset('public/images/project/') }}/" + response.image);
                        $("#edit_status").val(response.status);
                        $("#project_id").val(response.id);
                        $("#project_image").val(response.image);
                    }
                });
            });

            // Update
            $("#edit_project_form").submit(function (e) {
                e.preventDefault();
                const formData = new FormData($("#edit_project_form")[0]);

                $("#update_project_btn").text('Updating...');

                $.ajax({
                    url: '{{ route('project.update') }}',
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#EditProjectModal").modal('hide');
                            $("#edit_project_form")[0].reset();
                            $("#update_project_btn").text('Update');

                            fetchProject();
                        }
                    },

                });
            });

            //Delete
            $(document).on('click','.projectDeleteIcon',function (e) {
                e.preventDefault();
                let id = $(this).attr('id');

                $.ajax({
                    url: '{{ route('project.delete') }}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        fetchProject();
                    }
                });
            });


        });
    </script>

@endpush
