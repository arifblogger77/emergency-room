    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ __('Master') }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('person') }}">
                {{ __('Person') }}
            </a>
            <a class="dropdown-item" href="{{ route('bed') }}">
                {{ __('Bed') }}
            </a>
            <a class="dropdown-item" href="{{ route('shift') }}">
                {{ __('Shift') }}
            </a>
            <a class="dropdown-item" href="{{ route('med') }}">
                {{ __('Med') }}
            </a>
            <a class="dropdown-item" href="{{ route('welcome') }}">
                {{ __('Email') }}
            </a>
            <a class="dropdown-item" href="{{ route('welcome') }}">
                {{ __('Phone No') }}
            </a>
            <a class="dropdown-item" href="{{ route('welcome') }}">
                {{ __('Phone Address') }}
            </a>
        </div>

    </li>
