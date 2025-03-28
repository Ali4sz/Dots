<x-layout>
    <x-slot:title>Login / Sign Up - Dots</x-slot:title>
    <x-slot:body>
        <section class="login-container">
            <div class="login-tabs" role="tablist">
                <x-button class="login-tab-btn active" data-tab="login" aria-selected="true">Login</x-button>
                <x-button class="login-tab-btn" data-tab="signup" aria-selected="false">Sign Up</x-button>
            </div>
            <div class="login-form">
                <!-- Login Form -->
                <form id="login" class="login-form-content active" action="{{ route('login') }}" method="POST"
                    role="tabpanel">
                    @csrf
                    <h2>Login to Dots</h2>
                    <x-form-fields for="login-email" type="email" id="login-email" name="email"
                        placeholder="Enter your email">Email</x-form-fields>
                    <x-error field="email"></x-error>

                    <x-form-fields for="login-password" type="password" id="login-password" name="password"
                        placeholder="Enter your password">Password</x-form-fields>
                    <x-error field="password"></x-error>

                    <x-button type="submit" class="login-auth-btn">Login</x-button>
                    <p class="login-form-link">Forgot Password? <a href="#reset">Reset here</a></p>
                </form>
                <!-- Signup Form -->
                <form id="signup" class="login-form-content" action="{{ route('signup') }}" method="POST"
                    role="tabpanel">
                    @csrf
                    <h2>Join Dots</h2>

                    <x-form-fields for="signup-first-name" type="text" id="signup-first-name" name="first-name"
                        placeholder="Enter your first name">First Name</x-form-fields>
                    <x-error field="first-name"></x-error>

                    <x-form-fields for="signup-last-name" type="text" id="signup-last-name" name="last-name"
                        placeholder="Enter your last name">Last Name</x-form-fields>
                    <x-error field="last-name"></x-error>

                    <x-form-fields for="user-name" type="text" id="user-name" name="user-name"
                        placeholder="Enter a name of your choice">User Name</x-form-fields>
                    <x-error field="user-name"></x-error>

                    <x-form-fields for="signup-email" type="email" id="signup-email" name="new-email"
                        placeholder="Enter your email">Email</x-form-fields>
                    <x-error field="new-email"></x-error>

                    <x-form-fields for="signup-password" type="password" id="signup-password" name="new-password"
                        placeholder="Create a password">Password</x-form-fields>
                    <x-error field="new-password"></x-error>

                    <x-button type="submit" class="login-auth-btn">Sign Up</x-button>
                    <p class="login-form-link">Already have an account? <a href="#" onclick="showTab('login')">Login
                            here</a></p>
                </form>
            </div>
        </section>
    </x-slot:body>
</x-layout>