<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Category
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item {{ Request::is('family_heads/list*') ? 'active' : '' }}" href="{{route('family.head') }}">Family</a>
        <a class="dropdown-item {{ Request::is('farmers/list*') ? 'active' : null }}" href="{{route('farmers.list') }}">Farmers</a>
        <a class="dropdown-item {{ Request::is('household_heads/list*') ? 'active' : null }}" href="{{route('household.head') }}">Household</a>
        <a class="dropdown-item {{ Request::is('ofw/list*') ? 'active' : null }}" href="{{route('ofw.list') }}">OFW</a>
        <a class="dropdown-item {{ Request::is('out_of_school_youth/list*') ? 'active' : null }}" href="{{route('osy.list') }}">Out of School Youth</a>
        <a class="dropdown-item {{ Request::is('person_with_disability/list*') ? 'active' : null }}" href="{{route('pwd.list') }}">PWD</a>
        <a class="dropdown-item {{ Request::is('senior_citizen/list*') ? 'active' : null }}" href="{{route('senior_citisen.list') }}">Senior Citizens</a>
        <a class="dropdown-item {{ Request::is('solo_parent/list*') ? 'active' : null }}" href="{{route('solo_parent.list') }}">Solo Parent</a>
        <a class="dropdown-item {{ Request::is('4ps/list*') ? 'active' : '' }}" href="{{route('4ps.list') }}">4Ps</a>
        <a class="dropdown-item {{ Request::is('business_owner/list*') ? 'active' : null }}" href="{{route('business_owner.list') }}">Business Owner</a>
        <a class="dropdown-item {{ Request::is('children/list*') ? 'active' : null }}" href="{{route('children.list') }}">Children</a>
        <a class="dropdown-item {{ Request::is('women/list*') ? 'active' : null }}" href="{{route('women.list') }}">Women</a>
    </div>
</li>
