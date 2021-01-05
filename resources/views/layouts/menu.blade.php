    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ __('Master') }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('person') }}">
                {{ __('Person') }}
            </a>
            <a class="dropdown-item" href="{{ route('shift') }}">
                {{ __('Shift') }}
            </a>
            <a class="dropdown-item" href="{{ route('bed') }}">
                {{ __('Bed') }}
            </a>
            <a class="dropdown-item" href="{{ route('medication') }}">
                {{ __('Medication') }}
            </a>
            <a class="dropdown-item" href="{{ route('status') }}">
                {{ __('Status') }}
            </a>
            <a class="dropdown-item" href="{{ route('worker-shift') }}">
                {{ __('Worker Shift') }}
            </a>
            <a class="dropdown-item" href="{{ route('med') }}">
                {{ __('Med') }}
            </a>
            <a class="dropdown-item" href="{{ route('beda') }}">
                {{ __('Beda') }}
            </a>
            <a class="dropdown-item" href="{{ route('adm') }}">
                {{ __('Admission') }}
            </a>
        </div>

    </li>
