<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Hotel Reservation')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/custom-ui.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 min-h-screen">
    <!-- Navigation Bar -->
    <nav class="nav-modern fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-200/50 shadow-sm">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Brand -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary to-accent rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">G</span>
                        </div>
                        <span class="text-xl font-bold gradient-text">Grand Hotel</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary font-medium transition-colors duration-200">Home</a>
                    <a href="{{ route('rooms.index') }}" class="text-gray-700 hover:text-primary font-medium transition-colors duration-200">Rooms</a>
                    @auth
                        @if(auth()->user()->hasRole('customer'))
                            <a href="{{ route('customer.dashboard') }}" class="text-gray-700 hover:text-primary font-medium transition-colors duration-200">Dashboard</a>
                        @elseif(auth()->user()->hasRole(['admin', 'super_admin', 'receptionist']))
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-primary font-medium transition-colors duration-200">Admin</a>
                        @endif
                    @endauth
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center space-x-4">
                    @auth
                        <!-- User Menu -->
                        <div class="flex items-center space-x-3">
                            <span class="text-sm text-gray-700 font-medium">{{ auth()->user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="btn-modern px-4 py-2 text-sm font-medium">
                                    Logout
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Login/Register Buttons -->
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary font-medium transition-colors duration-200 px-3 py-2 rounded-lg hover:bg-gray-50">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="btn-modern px-4 py-2 text-sm font-medium">
                                Register
                            </a>
                        </div>
                    @endauth

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button class="text-gray-700 hover:text-primary p-2" onclick="toggleMobileMenu()">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200 py-4">
                <div class="flex flex-col space-y-3 px-4">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary font-medium py-2">Home</a>
                    <a href="{{ route('rooms.index') }}" class="text-gray-700 hover:text-primary font-medium py-2">Rooms</a>
                    @auth
                        @if(auth()->user()->hasRole('customer'))
                            <a href="{{ route('customer.dashboard') }}" class="text-gray-700 hover:text-primary font-medium py-2">Dashboard</a>
                        @elseif(auth()->user()->hasRole(['admin', 'super_admin', 'receptionist']))
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-primary font-medium py-2">Admin</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="pt-2">
                            @csrf
                            <button type="submit" class="btn-modern w-full py-2 text-sm font-medium">
                                Logout
                            </button>
                        </form>
                    @else
                        <div class="flex flex-col space-y-2 pt-2">
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary font-medium py-2">Login</a>
                            <a href="{{ route('register') }}" class="btn-modern py-2 text-sm font-medium text-center">Register</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Add padding to account for fixed navbar -->
    <div class="pt-16">
        @yield('content')
    </div>

    <script>
        // Initialize AOS when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-out-cubic',
                    once: true,
                    offset: 50,
                    disable: window.innerWidth < 768 // Disable on mobile for better performance
                });
            }

            // Page transition animation
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.5s ease-in-out';
            setTimeout(() => {
                document.body.style.opacity = '1';
            }, 100);

            // Smooth hover effects
            // Card hover effects
            document.querySelectorAll('.card-hover').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                    this.style.boxShadow = '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)';
                });
            });

            // Button hover effects
            document.querySelectorAll('.btn-hover').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.02)';
                });
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });

            // Image lazy loading and hover effects
            document.querySelectorAll('.room-image').forEach(img => {
                img.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05)';
                });
                img.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });

            // Mobile menu toggle
            window.toggleMobileMenu = function() {
                const mobileMenu = document.getElementById('mobile-menu');
                mobileMenu.classList.toggle('hidden');
            };
        });

        // Fallback for AOS if CDN fails
        window.addEventListener('load', function() {
            if (typeof AOS === 'undefined') {
                console.warn('AOS library not loaded, animations will not work');
            }
        });
    </script>
</body>
</html>