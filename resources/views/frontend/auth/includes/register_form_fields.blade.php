<div class="form-group">
    <input type="text" name="username" class="form-control auth-form-input" placeholder="Username"
        value="{{old('username')}}" maxlength="40" required>
</div>
<div class="form-group">
    <input type="text" name="first_name" class="form-control auth-form-input" placeholder="First Name"
        value="{{old('first_name')}}" maxlength="255" required>
</div>
<div class="form-group">
    <input type="text" name="last_name" class="form-control auth-form-input" placeholder="Last Name"
        value="{{old('last_name')}}" maxlength="255" required>
</div>
<div class="form-group">
    <input type="email" name="email" class="form-control auth-form-input" placeholder="Email Address"
        value="{{old('email')}}" maxlength="255" required>
</div>
<div class="form-group">
    <input type="text" name="mobile" class="form-control auth-form-input" placeholder="Mobile Number"
        value="{{old('mobile')}}" maxlength="255" required>
</div>
<div class="form-group">
    <input type="password" name="password" class="form-control auth-form-input" placeholder="Password" value=""
        minlength="4" maxlength="255" autocomplete="on" required>
</div>
<div class="form-group">
    <input type="password" name="confirm_password" class="form-control auth-form-input" placeholder="Confirm Password"
        maxlength="255" autocomplete="on" required>
</div>
<div class="form-group m-t-5 m-b-20">
    <div class="custom-control custom-checkbox custom-control-validate-input">
        <input type="checkbox" class="custom-control-input" name="terms" id="checkbox_terms" required>
        <label for="checkbox_terms" class="custom-control-label">I have read and agree
            to the&nbsp;
            <a href="javascript:void(0);" class="link-terms" target="_blank"><strong>Terms &amp;
                    Conditions</strong></a>
        </label>
    </div>
</div>
