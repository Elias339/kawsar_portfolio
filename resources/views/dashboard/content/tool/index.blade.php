@extends('dashboard.app')
@section('main')
    <!-- Data table -->
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="mt-5">
                    <div class="d-flex justify-content-start">
                        <h2>Tools</h2>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddToolModal">
                            Create Tools
                        </button>
                    </div>
                </div>
                <div class="card-body mt-1 bg-light" id="show_tool_info">
                    <h1 class="text-center text-secondary my-5">Loading.......</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Slider Modal -->
    <div class="modal fade" id="AddToolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Tools</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tool.store') }}" method="POST" id="add_tool_form" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            <div class="error-name mb-4"></div>
                        </div>


                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image" >
                            <div class="error-image mb-4"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="add_tool_btn">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Edit Slider Modal -->
    <div class="modal fade" id="EditToolModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tools</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('tool.update') }}" method="POST" id="edit_tool_form" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="tool_id" id="tool_id">
                    <input type="hidden" name="tool_image" id="tool_image">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="edit_name">Name</label>
                            <input type="text" class="form-control" name="name" id="edit_name" placeholder="Name">
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
                        <button type="submit" class="btn btn-primary" id="update_tool_btn">Update</button>
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
            $("#add_tool_form").submit(function (event) {
                event.preventDefault();
                const formData = new FormData($("#add_tool_form")[0]);


                $(".text-danger").remove();

                $(".error-image").empty();

                $("#add_tool_btn").text('Adding...');

                $.ajax({
                    url: "{{route('tool.store')  }}",
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#AddToolModal").modal('hide');
                            $("#add_tool_form")[0].reset();
                            $("#add_tool_btn").text('Add Tool');

                            fetchTool();
                        }
                    },
                    error:function (err) {
                        let error = err.responseJSON;
                        $.each(error.errors,function (index,value) {
                            $(`.error-${index}`).append('<span class="text-danger">'+value+'</span>'+'<br>');
                            $("#add_tool_btn").text('Add Slider');
                        });
                    },

                });
            });

            // Fetch
            fetchTool();
            function fetchTool() {
                $.ajax({
                    url: '{{ route('tool.fetch') }}',
                    method: 'get',
                    success: function (data) {
                        if (data.length > 0) {
                            var key = 0;
                            var output = '<table class="table align-middle table-striped table-bordered table-responsive">';
                            output += '<thead><tr class="text-center"><th>SL</th><th>Name</th><th>Image</th><th>Status</th><th>Action</th></tr></thead><tbody>';

                            $.each(data, function (index,tools) {
                                output += '<tr class="text-center">';
                                output += '<td>' + ++key + '</td>';
                                output += '<td>' + tools.name + '</td>';
                                output += '<td><img src="{{ asset('/') }}/' + tools.image + '" width="50" class="img-thumbnail"></td>';
                                output += '<td>' + tools.status + '</td>';
                                output += '<td class="btn-group align-middle">';
                                output += '<a href="#" id="' + tools.id + '" class="btn btn-sm btn-primary toolEditIcon" data-bs-toggle="modal" data-bs-target="#EditToolModal">Edit</a>';
                                output += '<a href="#" id="' + tools.id + '" class="btn btn-sm btn-danger mx-1 toolDeleteIcon">Delete</a>';
                                output += '</td></tr>';
                            });

                            output += '</tbody></table>';
                            $('#show_tool_info').html(output);
                        } else {
                            $('#show_tool_info').html('<h1 class="text-center text-secondary my-5">No record in the database!</h1>');
                        }
                    },
                });
            }

            // Edit
            $(document).on('click','.toolEditIcon',function (e) {
                e.preventDefault();
                let id = $(this).attr('id');

                $.ajax({
                    url: '{{ route('tool.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    } ,
                    success: function (response) {
                        $("#edit_name").val(response.name);
                        $("#edit_image").attr('src', "{{ asset('public/images/tool/') }}/" + response.image);
                        $("#edit_status").val(response.status);
                        $("#tool_id").val(response.id);
                        $("#tool_image").val(response.image);
                    }
                });
            });

            // Update
            $("#edit_tool_form").submit(function (e) {
                e.preventDefault();
                const formData = new FormData($("#edit_tool_form")[0]);

                $("#update_tool_btn").text('Updating...');

                $.ajax({
                    url: '{{ route('tool.update') }}',
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#EditToolModal").modal('hide');
                            $("#edit_tool_form")[0].reset();
                            $("#update_tool_btn").text('Update');

                            fetchTool();
                        }
                    },

                });
            });

            //Delete
            $(document).on('click','.toolDeleteIcon',function (e) {
                e.preventDefault();
                let id = $(this).attr('id');

                $.ajax({
                    url: '{{ route('tool.delete') }}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        fetchTool();
                    }
                });
            });


        });
    </script>

@endpush
