<div class="scholarship-card">
    <div class="scholarship-card__content">
        <img class="scholarship-card__image"
            src="https://img.freepik.com/vector-gratis/fondo-linea-elegante-hexagonal-patron_1017-19742.jpg?size=626&ext=jpg&ga=GA1.1.539837299.1711756800&semt=ais"
            alt="scholarship image" />

        <h5 class="scholarship-card__title">{{ $scholarship->name }}</h5>
        <div class="scholarship-card__view-link">
            <livewire:modals.view-scholarship :scholarship="$scholarship" />
        </div>

        <div class="scholarship-card__stats">
            <span class="scholarship-card__stats-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
                {{-- APPLICANTS NUMBER --}}
                77
            </span>
        </div>
    </div>
</div>
