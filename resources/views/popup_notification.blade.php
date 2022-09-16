<div class="custom-notification-container">
    <div class="custom-notification-image-wrapper">
        <!-- <strong style="text-transform: uppercase">{{ substr($user->name, 0, 2) }}</strong> -->
        @if($user->avatar)
            <img style="width:30px; height:30px; border-radius:50%;" src="{{ asset($user->avatar) }}">
        @else
            <img style="width:30px; height:30px; border-radius:50%;" src="{{ asset('frontend/assets/images/default.jpeg') }}">
        @endif
    </div>
    <div class="custom-notification-content-wrapper">
    <p class="custom-notification-content">
        <small style="display: block; font-size: 15px; font-weight: 700; color: #000; margin-bottom: 10px;">
            @if(strlen($user->name) > 5 )
                {{ substr($user->name, 0, 5) }} ****
            @else
                {{ substr($user->name, 0, 5) }}
            @endif
            <span> just reported</span>
        </small>
        <small style="display: block">
            The AEFI is
            <span>
                {{ $effects ?? '' }}
            </span>
        </small>
        <small style="display: block">
            Vaccine :
            <span>
                {{ $user->vaccine_type ?? '' }}
            </span>
        </small>
    </p>
    </div>
</div>
