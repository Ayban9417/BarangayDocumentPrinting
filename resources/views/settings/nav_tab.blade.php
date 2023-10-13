

<li class="nav-item">
    <a class="nav-link {{ Request::is('settings/barangay*') ? 'active' : '' }}"  href="{{route('settings.brgy') }}" role="tab">Puroks</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('settings/sector*') ? 'active' : '' }}"  href="{{route('settings.sector') }}" role="tab">Sectors</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('settings/officers*') ? 'active' : '' }}"  href="{{route('settings.officers') }}" role="tab">Baranggay Officials</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('settings/edit*') ? 'active' : '' }}"  href="{{route('settings.edit') }}" role="tab">Baranggay Settings</a>
</li>



          
       
          
          