{{-- by:jai
main page for Products
this page template from View\Tables --}}

<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="card border shadow-xs mb-0">
            <x-app.footer />
    </main>
</x-app-layout>