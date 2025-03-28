<x-layout>
    <x-slot:title>Edit My Data</x-slot:title>
    <x-slot:div>
        <div class="background-canvas"></div> <!-- Background layer for interactivity -->
    </x-slot:div>
    <x-slot:body>
        <section class="edit-profile-container">
            <h1>Edit Profile</h1>
            <form action="{{ route('update') }}" method="POST" class="edit-profile-form">
                @csrf
                <x-form-fields for="user-name" type="text" id="user-name" name="user_name"
                    value="{{ $info['user_name'] }}">
                    User Name
                </x-form-fields>

                <x-form-fields for="old_password" type="password" id="old_password" name="old_password"
                    placeholder="Enter Your Old Password">
                    Old Password
                </x-form-fields>
                <x-error field="old_password"></x-error>

                <x-form-fields for="password" type="password" id="password" name="password"
                    placeholder="Enter The New Password">
                    New Password
                </x-form-fields>
                <x-error field="password"></x-error>

                <x-form-fields for="password_confirmation" type="password" id="password_confirmation"
                    name="password_confirmation" placeholder="Re-Enter The Password">Password Confirmation
                </x-form-fields>
                <x-error field="password_confirmation"></x-error>


                <div class="edit-form-group edit-form-row">
                    <x-form-fields for="city" type="text" id="city" name="city" value="{{ $userDetail->city }}">
                        City
                    </x-form-fields>
                    <x-error field="city"></x-error>

                    <x-form-fields for="district" type="text" id="district" name="district"
                        value="{{$userDetail->district}}">District
                    </x-form-fields>
                </div>

                <div class="edit-form-group edit-form-row">
                    <x-form-fields for="street" type="text" id="street" name="street" value="{{ $userDetail->street }}">
                        Street
                    </x-form-fields>

                    <x-form-fields for="postal-code" type="text" id="postal-code" name="postal_code"
                        value="{{ $userDetail->postal_code }}">Postal
                        Code
                    </x-form-fields>
                </div>

                <div class="edit-form-group edit-form-row">
                    <x-form-fields for="phone" class="edit-form-subgroup" type="tel" id="phone" name="phone"
                        value="{{ $userDetail->phone_number }}">Phone
                    </x-form-fields>

                    <div class="login-form-group">
                        <label for="country">Country Code</label>
                        <select id="country" name="country_code" required>
                            <option value="+1" selected>+1 (US)</option>
                            <option value="+44">+44 (UK)</option>
                            <option value="+33">+33 (FR)</option>
                            <option value="+91">+91 (IN)</option>
                        </select>
                    </div>
                </div>
                <div class="edit-form-actions">
                    <x-button class="edit-submit-btn" type="submit">Save Changes</x-button>
                    <x-button style="a" href="{{ route('profile') }}" class="edit-cancel-btn">Cancel</x-button>
                </div>
            </form>
        </section>
    </x-slot:body>
</x-layout>