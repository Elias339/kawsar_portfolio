@extends('dashboard.app')
@section('main')

<div class="container">
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="mt-5">
                <div class="d-flex justify-content-start">
                    <h2>Slider</h2>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddSliderModal">
                        Create Slider
                    </button>
                </div>
            </div>
            <div class="card-body mt-1 bg-light" id="show_slider_info">
                <h1 class="text-center text-secondary my-5">Loading.......</h1>
            </div>
        </div>
    </div>
</div>

<!-- Create Slider Modal -->
<div class="modal fade" id="AddSliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('slider.store') }}" method="POST" id="add_slider_form" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                        <div class="error-title mb-4"></div>
                    </div>


                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="image" >
                        <div class="error-image mb-4"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="add_slider_btn">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Edit Slider Modal -->
<div class="modal fade" id="EditSliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('slider.update') }}" method="POST" id="edit_slider_form" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="slider_id" id="slider_id">
                <input type="hidden" name="slider_image" id="slider_image">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="edit_title">Title</label>
                        <input type="text" class="form-control" name="edit_title" id="edit_title" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="edit_status" class="form-label">Status</label>
                        <select name="status" id="edit_status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" id="edit_image" >
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="update_slider_btn">Update</button>
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
            $("#add_slider_form").submit(function (event) {
                event.preventDefault();
                const formData = new FormData($("#add_slider_form")[0]);


                $(".text-danger").remove();

                $(".error-image").empty();

                $("#add_slider_btn").text('Adding...');

                $.ajax({
                    url: "{{route('slider.store')  }}",
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#AddSliderModal").modal('hide');
                            $("#add_slider_form")[0].reset();
                            $("#add_slider_btn").text('Add Slider');

                            fetchSlider();
                        }
                    },
                    error:function (err) {
                        let error = err.responseJSON;
                        $.each(error.errors,function (index,value) {
                            $(`.error-${index}`).append('<span class="text-danger">'+value+'</span>'+'<br>');
                            $("#add_slider_btn").text('Add Slider');
                        });
                    },

                });
            });

            // Fetch
            fetchSlider();
            function fetchSlider() {
                $.ajax({
                    url: '{{ route('slider.fetch') }}',
                    method: 'get',
                    success: function (data) {
                        if (data.length > 0) {
                            var key = 0;
                            var output = '<table class="table align-middle table-striped table-bordered table-responsive">';
                            output += '<thead><tr class="text-center"><th>SL</th><th>Title</th><th>Image</th><th>Status</th><th>Action</th></tr></thead><tbody>';

                            $.each(data, function (index,slider) {
                                output += '<tr class="text-center">';
                                output += '<td>' + ++key + '</td>';
                                output += '<td>' + slider.title + '</td>';
                                output += '<td><img src="{{ asset('/') }}/' + slider.image + '" width="80" class="img-thumbnail"></td>';
                                output += '<td>' + slider.status + '</td>';
                                output += '<td>';
                                output += '<a href="#" id="' + slider.id + '" class="btn btn-sm btn-primary sliderEditIcon" data-bs-toggle="modal" data-bs-target="#EditSliderModal">Edit</a>';
                                output += '<a href="#" id="' + slider.id + '" class="btn btn-sm btn-danger mx-1 sliderDeleteIcon">Delete</a>';
                                output += '</td></tr>';
                            });

                            output += '</tbody></table>';
                            $('#show_slider_info').html(output);
                        } else {
                            $('#show_slider_info').html('<h1 class="text-center text-secondary my-5">No record in the database!</h1>');
                        }
                    },
                });
            }

            // Edit
            $(document).on('click','.sliderEditIcon',function (e) {
                e.preventDefault();
                let id = $(this).attr('id');

                $.ajax({
                    url: '{{ route('slider.edit') }}',
                    method: 'get',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    } ,
                    success: function (response) {
                        $("#edit_title").val(response.title);
                        $("#edit_image").attr('src', "{{ asset('public/images/slider/') }}/" + response.image);
                        $("#edit_status").val(response.status);
                        $("#slider_id").val(response.id);
                        $("#slider_image").val(response.image);
                    }
                });
            });

            // Update
            $("#edit_slider_form").submit(function (e) {
                e.preventDefault();
                const formData = new FormData($("#edit_slider_form")[0]);

                $("#update_slider_btn").text('Updating...');

                $.ajax({
                    url: '{{ route('slider.update') }}',
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#EditSliderModal").modal('hide');
                            $("#edit_slider_form")[0].reset();
                            $("#update_slider_btn").text('Update');

                            fetchSlider();
                        }
                    },

                });
            });

            //Delete
            $(document).on('click','.sliderDeleteIcon',function (e) {
                e.preventDefault();
                let id = $(this).attr('id');

                $.ajax({
                    url: '{{ route('slider.delete') }}',
                    method: 'delete',
                    data: {
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        fetchSlider();
                    }
                });
            });


        });
    </script>

@endpush
