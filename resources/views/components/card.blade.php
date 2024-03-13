
<!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->

<div {{ $attributes->merge(['class' => 'card card-outline card-primary shadow']) }}>
    <div class="card-header text-center">
        <h4 class="text-primary font-weight-bold">{{ $title }}</h4>
    </div>

    <div class="card-body">
        {{ $slot }}
    </div>

    <div class="card-footer bg-transparent mb-2">
        {{ $footer }}
    </div>
</div>