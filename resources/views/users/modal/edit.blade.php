<div class="fv-row mb-5 fv-plugins-icon-container">
    <label class="required fw-bold fs-6 mb-2">Full Name</label>
    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full Name"
        value="{{ $user->name }}">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="fv-row mb-5 fv-plugins-icon-container">
    <label class="required fw-bold fs-6 mb-2">Email
        <br><small class="text-muted">Allowed formats @gmail.com @yahoo.com</small>
    </label>
    <input type="email" name="email" class="form-control form-control-solid mb-3 mb-lg-0"
        placeholder="example@domain.com" pattern="^[a-zA-Z0-9._%+-]+@(gmail|yahoo)\.com$" value="{{ $user->email }}" disabled>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="fv-row mb-5 fv-plugins-icon-container">
    <label class="required fw-bold fs-6 mb-2">Password</label>
    <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Update Password">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


<div class="mb-5">
    <label class="required fw-bold fs-6 mb-2">Role</label>
    <div data-kt-user-table-filter="form">
        <div class="mb-10">
            <select class="form-select form-select-solid fw-bolder select2-hidden-accessible" style="height:50px;"
                data-kt-select2="true" data-placeholder="Select Option" data-allow-clear="true"
                data-kt-user-table-filter="role" data-hide-search="true" name="role"
                data-select2-id="select2-data-7-dvwh" tabindex="-1" aria-hidden="true">
                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                <option value="faculty" {{ $user->role == 'faculty' ? 'selected' : '' }}>Faculty</option>
                <option value="librarian" {{ $user->role == 'librarian' ? 'selected' : '' }}>Librarian</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        @error('role')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<input type="hidden" id="edit_id" name="id" value="{{ $user->id }}">

<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-outline-primary me-2" data-bs-dismiss="modal">Close</button>
    <button class="btn btn-primary" type="submit">
        <span class="indicator-label">Submit</span>
    </button>
</div>
