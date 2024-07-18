
<li>
    <a class="{{ request()->is('merchents*') ? 'active' : '' }}" href="{{ route('merchents.index') }}">
        <i data-acorn-icon="building-large" class="d-inline-block"></i>
        <span class="label">Merchants</span>
    </a>
</li>
