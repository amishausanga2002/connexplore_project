<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                        url('{{ asset('images/bg.webp') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .sidebar {
    background-color: #2d3748; /* Matching the navbar color */
    color: white;
    padding: 40px 20px 20px 20px; /* Increased top padding to make the sidebar taller from the top */
    height: auto; /* Adjust height of sidebar based on content */
    width: 250px;
    margin-top: auto; /* Increased margin to create more space between navbar and sidebar */
}


        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px;
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #3182ce; /* Hover effect with Tailwind Blue */
            color: white;
        }

        .content {
            padding: 20px;
            margin-left: 270px; /* Adjust to leave space for the sidebar */
        }

        .navbar {
            background-color: #2d3748; /* Same color as sidebar */
        }

    </style>

    <!-- Navbar -->
    <nav class="navbar p-4 shadow-md">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
                <div class="text-white text-2xl font-semibold">Connexplore System - User Dashbaord</div>
            </div>
            <div class="flex items-center space-x-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>
<br><br>
<body>
    <div class="container mx-auto p-4 bg-white shadow-md rounded-lg" style="max-width: 600px;">
        <h2 class="text-center font-bold mb-4" style="font-size: 24px; color: #333;">Create Booking</h2>

        @if(session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('bookings.store') }}" method="POST" style="font-size: 14px; color: #555;">
            @csrf

            <!-- CBnumber (mapped to user) -->
            <div class="mb-3">
                <label class="form-label block mb-2" style="font-weight: bold;">Email Address</label>
                <input type="email" class="form-control block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md" value="{{ Auth::user()->email }}" disabled>
            </div>

            <div class="mb-3">
                <label for="cbnumber" class="form-label block mb-2" style="font-weight: bold;">CBnumber</label>
                <input type="text" name="cbnumber" class="form-control block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md" placeholder="Enter your CBnumber" required value="{{ old('cbnumber') }}">

                @error('cbnumber')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Sport -->
            <div class="mb-3">
                <label for="sport_id" class="form-label block mb-2" style="font-weight: bold;">Sport</label>
                <select name="sport_id" class="form-select block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md" required>
                    <option value="">Select Sport</option>
                    @foreach($sports as $sport)
                        <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Equipment -->
            <div class="mb-3">
                <label for="equipment_id" class="form-label block mb-2" style="font-weight: bold;">Equipment</label>
                <select name="equipment_id" class="form-control" required>
                    <option value="">Select Equipment</option>
                    @foreach ($equipment as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Location -->
            <div class="mb-3">
                <label for="location_id" class="form-label block mb-2" style="font-weight: bold;">Location</label>
                <select name="location_id" class="form-select block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md" required>
                    <option value="">Select Location</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->branch }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Date -->
            <div class="mb-3">
                <label for="date" class="form-label block mb-2" style="font-weight: bold;">Date</label>
                <input type="date" name="date" class="form-control block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md" required>
            </div>

            <!-- Time Slot -->
            <div class="mb-3">
                <label for="time_slot" class="form-label block mb-2" style="font-weight: bold;">Time Slot</label>
                <select name="time_slot" class="form-select block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md" required>
                    <option value="">Select Time Slot</option>
                    <option value="8:00 AM - 9:00 AM">8:00 AM - 9:00 AM</option>
                    <option value="9:00 AM - 10:00 AM">9:00 AM - 10:00 AM</option>
                    <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                    <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                    <option value="12:00 PM - 1:00 PM">12:00 PM - 1:00 PM</option>
                    <option value="1:00 PM - 2:00 PM">1:00 PM - 2:00 PM</option>
                    <option value="2:00 PM - 3:00 PM">2:00 PM - 3:00 PM</option>
                    <option value="3:00 PM - 4:00 PM">3:00 PM - 4:00 PM</option>
                    <option value="4:00 PM - 5:00 PM">4:00 PM - 5:00 PM</option>
                </select>

                @error('time_slot')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary block w-full text-center py-2 rounded-md text-white" style="background-color: #007bff; border-color: #007bff; font-weight: bold;">Book Now</button>
        </form>
    </div>



</body>
<br><br>
<footer class="bg-black py-3">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
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
            <div class="flex justify-center space-x-4 flex-wrap">
                <img src="{{ asset('images/staf.png') }}" alt="University of Staffordshire" class="h-24 mb-4 md:mb-0">
                <img src="{{ asset('images/APIIT.png') }}" alt="Asian Institute of Technology" class="h-24 mb-4 md:mb-0">
                <img src="{{ asset('images/NCUK.png') }}" alt="NCUK" class="h-24 mb-4 md:mb-0">
                <img src="{{ asset('images/Southencross.png') }}" alt="Southern Cross University" class="h-24">
            </div>
        </div>
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
</html>