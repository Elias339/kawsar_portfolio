@extends('dashboard.app')
@section('main')

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="mt-5">
                    <div class="d-flex justify-content-start">
                        <h2>Project Category</h2>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCategoryModal">
                            Create Category
                        </button>
                    </div>
                </div>
                <div class="card-body mt-1 bg-light" id="show_category_info">
                    <h1 class="text-center text-secondary my-5">Loading.......</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Slider Modal -->
    <div class="modal fade" id="AddCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('projectCategory.store') }}" method="POST" id="add_category_form" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            <div class="error-name mb-4"></div>
                        </div>

                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Category Title">
                            <div class="error-title mb-4"></div>
                        </div>

                        <div class="form-group">
                            <label for="image">Image*</label>
                            <input type="file" class="form-control" name="image" id="image" >
                            <div class="error-image mb-4"></div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="add_category_btn">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Edit Slider Modal -->
    <div class="modal fade" id="EditCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('projectCategory.update') }}" method="POST" id="edit_category_form" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="category_id" id="category_id">
                    <input type="hidden" name="category_image" id="category_image">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="edit_name">Name*</label>
                            <input type="text" class="form-control" name="name" id="edit_name" placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="edit_title">Title*</label>
                            <input type="text" class="form-control" name="title" id="edit_title" placeholder="Category Title">
                        </div>

                        <div class="form-group">
                            <label for="edit_status" class="form-label">Status*</label>
                            <select name="status" id="edit_status" class="form-control">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image*</label>
                            <input type="file" class="form-control" name="image" id="edit_image" >
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="update_category_btn">Update</button>
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
            $("#add_category_form").submit(function (event) {
                event.preventDefault();
                const formData = new FormData($("#add_category_form")[0]);


                $(".text-danger").remove();

                $(".error-image").empty();

                $("#add_category_btn").text('Adding...');

                $.ajax({
                    url: "{{route('projectCategory.store')  }}",
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#AddCategoryModal").modal('hide');
                            $("#add_category_form")[0].reset();
                            $("#add_category_btn").text('Add Category');

                            fetchProjectCategory();
                        }
                    },
                    error:function (err) {
                        let error = err.responseJSON;
                        $.each(error.errors,function (index,value) {
                            $(`.error-${index}`).append('<span class="text-danger">'+value+'</span>'+'<br>');
                            $("#add_category_btn").text('Add Slider');
                        });
                    },

                });
            });

            // Fetch
            fetchProjectCategory();
            function fetchProjectCategory() {
                $.ajax({
                    url: '{{ route('projectCategory.fetch') }}',
                    method: 'get',
                    success: function (data) {
                        if (data.length > 0) {
                            var key = 0;
                            var output = '<table class="table align-middle table-striped table-bordered table-responsive">';
                            output += '<thead><tr class="text-center"><th>SL</th><th>Name</th><th>Title</th><th>Image</th><th>Status</th><th>Action</th></tr></thead><tbody>';

                            $.each(data, function (index,category) {
                                output += '<tr class="text-center">';
                                output += '<td>' + ++key + '</td>';
                                output += '<td>' + category.name + '</td>';
                                output += '<td>' + category.title + '</td>';
                                output += '<td><img src="{{ asset('/') }}/' + category.image + '" width="50" class="img-thumbnail"></td>';
                                output += '<td>' + category.status + '</td>';
                                output += '<td class="">';
                                output += '<a href="#" id="' + category.id + '" class="btn btn-primary categoryEditIcon" data-bs-toggle="modal" data-bs-target="#EditCategoryModal">Edit</a>';
                                output += '<a href="#" id="' + category.id + '" class="btn  btn-danger mx-1 categoryDeleteIcon">Delete</a>';
                                output += '</td></tr>';
                            });

                            output += '</tbody></table>';
                            $('#show_category_info').html(output);
                        } else {
                            $('#show_category_info').html('<h1 class="text-center text-secondary my-5">No record in the database!</h1>');
                        }
                    },
                });
            }

            // Edit
            $(document).on('click','.categoryEditIcon',function (e) {
                e.preventDefault();
                let id = $(this).attr('id');

                $.ajax({
                    url: '{{ route('projectCategory.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    } ,
                    success: function (response) {
                        $("#edit_name").val(response.name);
                        $("#edit_title").val(response.title);
                        $("#edit_image").attr('src', "{{ asset('public/images/project_category/') }}/" + response.image);
                        $("#edit_status").val(response.status);
                        $("#category_id").val(response.id);
                        $("#category_image").val(response.image);
                    }
                });
            });

            // Update
            $("#edit_category_form").submit(function (e) {
                e.preventDefault();
                const formData = new FormData($("#edit_category_form")[0]);

                $("#update_category_btn").text('Updating...');

                $.ajax({
                    url: '{{ route('projectCategory.update') }}',
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#EditCategoryModal").modal('hide');
                            $("#edit_category_form")[0].reset();
                            $("#update_category_btn").text('Update');

                            fetchProjectCategory();
                        }
                    },

                });
            });

            //Delete
            $(document).on('click','.categoryDeleteIcon',function (e) {
                e.preventDefault();
                let id = $(this).attr('id');

                $.ajax({
                    url: '{{ route('projectCategory.delete') }}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        fetchProjectCategory();
                    }
                });
            });


        });
    </script>

@endpush
