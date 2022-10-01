<div class="tab-pane fade profile-edit pt-3" id="profile-edit">

<!-- Profile Edit Form -->
<form enctype="multipart/form-data" action="{{route('user.profile.update', Auth::user()->id )}}" method="post">
@csrf

@method('PATCH')
  <div class="row mb-3">
    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
    <div class="col-md-8 col-lg-9">
      
      <div class="pt-2">
      
        <input id="image" name="image" type="file" class="form-control" value="{{Auth::user()->id}}">

      </div>
    </div>
  </div>

  <div class="row mb-3">
    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
    <div class="col-md-8 col-lg-9">
      <input name="name" type="text" class="form-control" id="name" value="{{old('name', Auth::user()->name)}}">
    </div>
  </div>

  <div class="row mb-3">
    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
    <div class="col-md-8 col-lg-9">
      <textarea name="about" class="form-control" id="about" style="height: 100px">{{old('name', Auth::user()->about)}}</textarea>
    </div>
  </div>

  <div class="row mb-3">
    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
    <div class="col-md-8 col-lg-9">
      <input name="job" type="text" class="form-control" id="Job" value="{{old('name', Auth::user()->job)}}">
    </div>
</div>

  <div class="row mb-3">
    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
    <div class="col-md-8 col-lg-9">
      <input name="address" type="text" class="form-control" id="Address" value="{{old('name', Auth::user()->address)}}">
    </div>
  </div>

  <div class="row mb-3">
    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
    <div class="col-md-8 col-lg-9">
      <input name="phone" type="text" class="form-control" id="Phone" value="{{old('name', Auth::user()->phone)}}">
    </div>
  </div>

  <div class="row mb-3">
    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
    <div class="col-md-8 col-lg-9">
      <input name="email" type="email" class="form-control" id="Email" value="{{old('name', Auth::user()->email)}}">
    </div>
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </div>
</form>
<!-- End Profile Edit Form -->

</div>
