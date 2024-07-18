<div class="fv-row mb-5 fv-plugins-icon-container">
    <label class="required fw-bold fs-6 mb-2">Merchant Name</label>
    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Merchant Name"
        value="{{ $data->name }}">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="fv-row mb-5 fv-plugins-icon-container">
    <label class="required fw-bold fs-6 mb-2">Tokenization Key</label>
    <input type="text" name="tokenization" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Tokenization Key"
        value="{{ $data->tokenization }}">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    @error('tokenization')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="fv-row mb-5 fv-plugins-icon-container">
    <label class="required fw-bold fs-6 mb-2">API Key</label>
    <input type="text" name="api_key" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="API Key"
        value="{{ $data->api_key }}">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    @error('api_key')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="fv-row mb-5 fv-plugins-icon-container">
    <label class="required fw-bold fs-6 mb-2">Public Checkout Key</label>
    <input type="text" name="public_checkout" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Public Checkout Key"
        value="{{ $data->public_checkout }}">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    @error('public_checkout')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<input type="hidden" id="edit_id" name="id" value="{{ $data->id }}">

<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-outline-primary me-2" data-bs-dismiss="modal">Close</button>
    <button class="btn btn-primary" type="submit">
        <span class="indicator-label">Submit</span>
    </button>
</div>
