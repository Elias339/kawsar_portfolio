@extends('dashboard.app')
@section('main')
    <div class="container">
        <div class="card shadow mt-5 mb-5">
            <div class="row mt-5">
                <div class="col-md-10 offset-1 mt-3">
                    <h2>Web Basic Settings</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 offset-1 mt-3">
                    <form class="" action="{{route('webSettings.update')}}" id="edit_basic_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label for="name" class="form-label" style="font-size: 18px">Name</label>
                                    <input type="text" class="form-control form-check-info shadow" name="name" id="name" value="{{$websetting->name ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label for="address" class="form-label" style="font-size: 18px">Address</label>
                                    <input type="text" class="form-control form-check-info shadow" name="address" id="address" value="{{$websetting->address ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label for="profile" class="form-label" style="font-size: 18px">Profile</label>
                                    <input type="file" class="form-control form-check-info shadow" name="profile" id="profile"  >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    @if($websetting->profile ?? '')
                                        <img style="height: 70px; width: 70px;" src="{{ asset($websetting->profile ?? '') }}" alt="profile">
                                    @else
                                        <span>No profile available</span>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label for="logo" class="form-label" style="font-size: 18px">Logo</label>
                                    <input type="file" class="form-control form-check-info shadow" name="logo" id="logo"  >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    @if($websetting->logo ?? '')
                                        <img style="height: 70px; width: 70px;" src="{{ asset($websetting->logo ?? '') }}" alt="logo">
                                    @else
                                        <span>No logo available</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label for="email" class="form-label" style="font-size: 18px">Email</label>
                                    <input type="email" class="form-control form-check-info shadow" name="email" id="email"  value="{{$websetting->email ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mr-2">
                                    <label for="phone" class="form-label" style="font-size: 18px">Phone</label>
                                    <input type="tel" class="form-control form-check-info shadow" name="phone" id="phone" value="{{$websetting->phone ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group mr-2">
                                    <label for="about_title" class="form-label" style="font-size: 18px">About Title</label>
                                    <input type="text" class="form-control form-check-info shadow" name="about_title" id="about_title" value="{{$websetting->about_title ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mr-2">
                                    <label for="about_description" class="form-label" style="font-size: 18px">About Description</label>
                                    <textarea class="form-control form-check-info shadow" name="about_description" id="about_description" >{{$websetting->about_description ?? ''}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="ml-3 mb-2 mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary" id="update_basic_btn">Update</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-10 offset-1 mt-3">
                    <h2>Social Links</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 offset-1 mt-3">

                    <form class="" action="{{ route('webSettings.social.update') }}" id="edit_social_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label class="form-label" for="facebook" style="font-size: 18px">Facebook</label>
                                    <input type="url" class="form-control form-check-info shadow" name="facebook" id="facebook" value="{{$websetting->facebook ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mr-2">
                                    <label class="form-label" for="instagram" style="font-size: 18px">Instagram</label>
                                    <input type="url" class="form-control form-check-info shadow" name="instagram" id="instagram" value="{{$websetting->instagram ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label class="form-label" for="youtube" style="font-size: 18px">Youtube</label>
                                    <input type="url" class="form-control form-check-info shadow" name="youtube" id="youtube"  value="{{$websetting->youtube ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mr-2">
                                    <label class="form-label" for="behance" style="font-size: 18px">Behance</label>
                                    <input type="url" class="form-control form-check-info shadow" name="behance" id="behance" value="{{$websetting->behance ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label class="form-label" for="dribbble" style="font-size: 18px">Dribbble</label>
                                    <input type="url" class="form-control form-check-info shadow" name="dribbble" id="dribbble"  value="{{$websetting->dribbble ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mr-2">
                                    <label class="form-label" for="pinterest" style="font-size: 18px">Pinterest</label>
                                    <input type="url" class="form-control form-check-info shadow" name="pinterest" id="pinterest" value="{{$websetting->pinterest ?? ''}}">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label class="form-label" for="twitter" style="font-size: 18px">Twitter</label>
                                    <input type="url" class="form-control form-check-info shadow" name="twitter" id="twitter"  value="{{$websetting->twitter ?? ''}}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ml-2">
                                    <label class="form-label" for="twitter" style="font-size: 18px">Linkedin</label>
                                    <input type="url" class="form-control form-check-info shadow" name="linkedin" id="linkedin"  value="{{$websetting->linkedin ?? ''}}">
                                </div>
                            </div>
                        </div>


                        <div class="row mt-2 mb-5">
                            <div class="col-md-12">
                                <div class="ml-3">
                                    <button type="submit" class="btn btn-lg btn-primary" id="update_social_btn">Update</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script>
        $(function () {
            //Basic settings Update
            $("#edit_basic_form").submit(function (e) {
                e.preventDefault();
                const formData = new FormData($("#edit_basic_form")[0]);

                $("#update_basic_btn").text('Updating...');

                $.ajax({
                    url: '{{ route('webSettings.update') }}',
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#edit_basic_form")[0].reset();
                            $("#update_basic_btn").text('Update');
                            location.reload();
                        }
                    },

                });
            });

            //Social Update
            $("#edit_social_form").submit(function (e) {
                e.preventDefault();
                const formData = new FormData($("#edit_social_form")[0]);

                $("#update_social_btn").text('Updating...');

                $.ajax({
                    url: '{{ route('webSettings.social.update') }}',
                    method: 'post',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status == 'success') {
                            $("#edit_social_form")[0].reset();
                            $("#update_social_btn").text('Update');
                            location.reload();
                        }
                    },

                });
            });
        });
    </script>

@endpush

