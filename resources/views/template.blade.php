<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            <h3 class="font-weight-bold mb-0">Hello, {{ auth()->user()->name }}</h3>
                        </div>
                        
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="row">
                @yield('content')
                
            </div>
            
            
            
            <x-app.footer />
        </div>
    </main>

</x-app-layout>
