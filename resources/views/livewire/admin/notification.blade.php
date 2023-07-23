
<div>

    <ul class="navbar-item ml-auto notification-badge">

        <i class="fa-solid fa-bell fa-2xl"></i>
        @if ($no > 0)
        <span class="badge bg-danger ml-auto badge" wire:model="no">{{$no}}</span> 
        @endif
        
    </ul>
</div>
