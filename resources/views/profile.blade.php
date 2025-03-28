<x-layout>
    <x-slot:title>My Profile</x-slot:title>
    <x-slot:div>
        <div class="background-canvas"></div> <!-- Background layer for interactivity -->
    </x-slot:div>
    
    <x-slot:navbar>
        <x-nav-bar>
            <x-slot:navlink>
                <div class="dropdown">
                    <button class="dropbtn">Menu</button>
                    <div class="dropdown-content">
                        <x-button style="a" href="{{ route('shop') }}">Shop</x-button>
                        <x-button style="a" href="{{ route('categories') }}">Categories</x-button>
                        <x-button style="a">Contact</x-button>
                    </div>
                </div>
            </x-slot:navlink>
        </x-nav-bar>
    </x-slot:navbar>

    <x-slot:body>
        <section class="profile-container">
            <div class="profile-header">
                <img src="{{ $userDetail->img_url ?? '' }}" alt="User Avatar" class="profile-avatar">
                <h1>{{ $info['user_name'] }}</h1>
                <p class="profile-email">john.doe@example.com</p>
            </div>
            <div class="profile-details">
                <h2>Profile Details</h2>
                <div class="profile-info">
                    <x-fields>
                        <x-slot:fieldname>Full Name:</x-slot:fieldname>
                        <x-slot:fieldinfo>{{ $info['first_name'] }} {{ $info['last_name'] }}</x-slot:fieldinfo>
                    </x-fields>

                    <x-fields>
                        <x-slot:fieldname>Email:</x-slot:fieldname>
                        <x-slot:fieldinfo>{{ $info['email'] }}</x-slot:fieldinfo>
                    </x-fields>

                    <x-fields>
                        <x-slot:fieldname>Address:</x-slot:fieldname>
                        <x-slot:fieldinfo>@if ($userDetail)
                            {{ $userDetail->city }}, {{ $userDetail->street }}, {{
                            $userDetail->postal_code}}@else non @endif</x-slot:fieldinfo>
                    </x-fields>

                    <x-fields>
                        <x-slot:fieldname>Phone:</x-slot:fieldname>
                        <x-slot:fieldinfo>@if ($userDetail)
                            ({{ $userDetail->country_code }}) {{ $userDetail->phone_number }} @else
                            non @endif</x-slot:fieldinfo>
                    </x-fields>

                </div>
                <div class="profile-actions">
                    <a href="{{ route('edit') }}" class="profile-edit-link">Edit Profile</a>
                    <form action="{{ route('logout') }}" method="POST" class="profile-logout-form">
                        @csrf
                        <x-button type="submit" class="profile-logout-btn">Logout</x-button>
                    </form>
                </div>
            </div>
        </section>
    </x-slot:body>
</x-layout>