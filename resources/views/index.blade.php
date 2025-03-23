<!DOCTYPE html>
<html lang="en" class="flex flex-col min-h-screen">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connex Explore</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">


</head>
<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                    url('{{ asset('images/bg.webp') }}') no-repeat center center fixed;
        background-size: cover;
    }
</style>
<body class="flex flex-col flex-1 bg-gray-900 text-gray-100">
    <header class="bg-gray-800 p-4 shadow-lg fixed top-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center text-xl font-bold text-white">
                <img src="{{ asset('images/logo.png') }}" alt="Site Logo" class="mr-3 h-8 w-auto">Connexplore
            </a>
            <button id="menu-btn" class="text-white md:hidden focus:outline-none">
                <i class="fas fa-bars" id="menu-icon"></i>
            </button>
            <nav id="menu" class="hidden absolute bg-gray-800 md:bg-transparent md:relative md:flex w-full md:w-auto top-full left-0 z-10">
                <nav id="menu" class="hidden absolute bg-gray-800 md:bg-transparent md:relative md:flex w-full md:w-auto top-full left-0 z-10">
                    <ul class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 p-4 md:p-0">
                        <li><a href="{{ url('/index') }}" class= "text-white hover:text-gray-400">Home</a></li>
                        <li><a href="{{ route('users.about-us') }}" class="text-white hover:text-gray-400">About Us</a></li>
                        <li><a href="{{ route('users.sports-page') }}" class="text-white hover:text-gray-400">Sports</a></li>
                        <li><a href="{{ route('users.events') }}" class="text-white hover:text-gray-400">Events</a></li>
                        <li><a href="{{ route('users.contact') }}" class="text-white hover:text-gray-400">Contact Us</a></li>
                        <li><a href="{{ route('dashboard') }}" class="text-white hover:text-gray-400">Dashboard</a></li>
                    </ul>


                </nav>
            </nav>
        </div>
    </header>
<br><br>
    <main class="flex flex-col flex-1 container mx-auto text-center p-4">
        <div class="px-4 py-6 md:px-8">
            <h2 class="text-xl md:text-3xl font-bold">Welcome to Connexplore!</h2>
            <p class="my-4 text-sm md:text-base">Welcome to Connex Explore, your premier gateway to sports and recreation at APIIT Sri Lanka!
                Whether you're looking to engage in a strategic game of chess, master the techniques of table tennis, or
                enjoy a relaxing round of carom with friends, our platform is designed to seamlessly book facilities and
                join in the fun. Dive into the world of sports with us where every game is an opportunity to connect,
                compete, and celebrate. Sign up today and transform the way you play!</p>
                <a href="{{ route('bookings.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-3 inline-block">
                    Book Now
                </a>
        </div>

        <br><br><br>
        <section class="bg-gray-800 bg-opacity-80 p-4 md:p-6 rounded-lg shadow-lg my-4 mx-auto w-full max-w-full md:max-w-md text-left">
            <h3 class="text-lg md:text-xl font-bold mb-3 text-white uppercase tracking-wide text-center">
                Available Sports and activities
            </h3>
            <p class="text-gray-300 text-xs md:text-sm mb-4 leading-relaxed text-center">
                Discover the wide variety of sports and activities available for booking at Connexplore.
            </p>

            <div class="bg-gray-900 bg-opacity-40 p-4 rounded-lg shadow-md">
                <ul class="list-disc list-inside text-gray-200 text-xs md:text-sm space-y-2">
                    <li>Chess</li>
                    <li>Futsal</li>
                    <li>Table Tennis</li>
                    <li>Carrom</li>
                    <li>Card Games</li>
                    <li>Pool</li>
                </ul>
            </div>
        </section>
        <section class="bg-gray-800 bg-opacity-80 p-4 md:p-6 rounded-lg shadow-lg my-4 mx-auto w-full max-w-full md:max-w-2xl text-left">
            <h3 class="text-lg md:text-xl font-bold mb-3 text-white uppercase tracking-wide text-center">
                User Reviews
            </h3>
            <div class="flex flex-col md:flex-row justify-between space-y-4 md:space-y-0 md:space-x-4">
                <!-- First Review -->
                <div class="bg-gray-900 bg-opacity-40 p-4 rounded-lg shadow-md flex-1">
                    <p class="text-gray-200 text-xs md:text-sm">"Connexplore has truly transformed how I engage in sports. Their facilities and booking system are top-notch!"</p>
                    <p class="text-gray-400 text-xs md:text-sm italic my-2">- Alex Johnson</p>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                    </div>
                </div>
                <!-- Second Review -->
                <div class="bg-gray-900 bg-opacity-40 p-4 rounded-lg shadow-md flex-1">
                    <p class="text-gray-200 text-xs md:text-sm">"Great experience, but I wish there were more evening slots available for working professionals."</p>
                    <p class="text-gray-400 text-xs md:text-sm italic my-2">- Sarah Lee</p>
                    <div class="flex">
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star text-yellow-400"></i>
                        <i class="fas fa-star-half-alt text-yellow-400"></i>
                        <i class="far fa-star text-yellow-400"></i>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <br><br><br><br>
    <footer class="bg-black py-3">
        <div class="container mx-auto px-4">
            <!-- First Row: Social Media Icons and Partner Logos -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                <!-- Social Media Icons -->
                <div class="flex justify-center space-x-4 mb-4 md:mb-0">
                    <a href="https://x.com/apiitsl?lang=en" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="https://www.facebook.com/APIITofficial" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="https://www.youtube.com/@APIITedu" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-youtube fa-lg"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/apiitsl" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                    <a href="https://www.instagram.com/apiitsl/" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </div>
                <!-- Partner Logos -->
                <div class="flex justify-center space-x-4 flex-wrap">
                    <img src="images/staf.png" alt="University of Staffordshire" class="h-24 mb-4 md:mb-0">
                    <img src="images/APIIT.png" alt="Asian Institute of Technology" class="h-24 mb-4 md:mb-0">
                    <img src="images/NCUK.png" alt="NCUK" class="h-24 mb-4 md:mb-0">
                    <img src="images/Southencross.png" alt="Southern Cross University" class="h-24">
                </div>
            </div>
            <!-- Second Row: Contact Information and Subscription Form -->
            <div class="flex flex-col md:flex-row justify-around text-gray-300 text-center md:text-left">
                <div class="mb-4 md:mb-0">
                    <h4 class="text-white text-lg font-semibold">APIIT City Campus</h4>
                    <address>
                        388, Union Place,<br>
                        Colombo 2, Sri Lanka.
                    </address>
                    <p>📞 +94 76 967 9448 - Chamalka</p>
                    <p>📞 +94 76 858 3708 - Gihani</p>
                    <p>📞 +94 77 753 5393 - Bimbisha</p>
                </div>
                <!-- Subscription Form -->
                <div class="mb-4 md:mb-0">
                    <h4 class="text-white text-lg font-semibold mb-2">Subscribe to get new offers, tournaments, etc.</h4>
                    <form onsubmit="event.preventDefault(); this.email.value='';">
                        <input type="email" name="email" placeholder="Your email" class="text-gray-800 px-4 py-2 rounded-l-lg focus:outline-none" required>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-r-lg">Subscribe</button>
                    </form>
                </div>
                <div>
                    <h4 class="text-white text-lg font-semibold">APIIT Law School</h4>
                    <address>
                        278, 3rd Floor, Access Towers,<br>
                        Colombo 2, Sri Lanka.
                    </address>
                    <p>📞 +94 76 967 9448 - Chamalka</p>
                    <p>📞 +94 76 858 3708 - Gihani</p>
                    <p>📞 +94 77 753 5393 - Bimbisha</p>
                </div>
            </div>
        </div>
    </footer>
</body>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('menu-btn');
        const menu = document.getElementById('menu');

        menuBtn.addEventListener('click', function () {
            menu.classList.toggle('hidden');
        });
    });
</script>
</html>
