@if(session()->has('success'))
    <div x-data="{show: true}"  x-init="setTimeout(() => show = flase, 3000)" x-show="show" class="post-created">
        {{ session()->get('success') }}
    </div>
@endif