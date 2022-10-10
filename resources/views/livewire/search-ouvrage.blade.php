<div>
    <div class="sidebar">
        <div class="sidebar-item search-form">
            <h3 class="sidebar-title">Rechercher</h3>
            <form action="{{ route('search.ouvrage') }}" method="GET" class="mt-3">
                <input type="text" name="search">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</div>
