document.getElementById("internshipForm").addEventListener("submit", function(event) {
    event.preventDefault();
    alert("Form submitted successfully!");
});
// Predefined list of countries and their states
// Predefined list of countries and their states
const countryStates = {
    "+1": [ // USA
        "Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", 
        "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", 
        "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", 
        "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", 
        "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", 
        "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", 
        "Texas", "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"
    ],
    "+91": [ // India
        "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", "Goa", "Gujarat", 
        "Haryana", "Himachal Pradesh", "Jharkhand", "Karnataka", "Kerala", "Madhya Pradesh", 
        "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", 
        "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", "Uttarakhand", 
        "West Bengal", "Andaman and Nicobar Islands", "Chandigarh", "Dadra and Nagar Haveli", 
        "Daman and Diu", "Lakshadweep", "Delhi", "Puducherry", "Ladakh", "Jammu & Kashmir"
    ],
    "+44": [ // United Kingdom
        "England", "Scotland", "Wales", "Northern Ireland"
    ],
    "+61": [ // Australia
        "New South Wales", "Victoria", "Queensland", "Western Australia", "South Australia", 
        "Tasmania", "Northern Territory", "Australian Capital Territory"
    ],
    "+81": [ // Japan
        "Hokkaido", "Aomori", "Iwate", "Miyagi", "Akita", "Yamagata", "Fukushima", "Ibaraki", 
        "Tochigi", "Gunma", "Saitama", "Chiba", "Tokyo", "Kanagawa", "Niigata", "Toyama", 
        "Ishikawa", "Fukui", "Yamanashi", "Nagano", "Gifu", "Shizuoka", "Aichi", "Mie", 
        "Shiga", "Kyoto", "Osaka", "Hyogo", "Nara", "Wakayama", "Tottori", "Shimane", "Okayama", 
        "Hiroshima", "Yamaguchi", "Tokushima", "Kagawa", "Ehime", "Kochi", "Fukuoka", "Saga", 
        "Nagasaki", "Kumamoto", "Oita", "Miyazaki", "Kagoshima", "Okinawa"
    ],
    "+86": [ // China
        "Beijing", "Tianjin", "Shanghai", "Chongqing", "Hebei", "Henan", "Yunnan", "Liaoning", 
        "Heilongjiang", "Hunan", "Anhui", "Shandong", "Xinjiang", "Jiangsu", "Zhejiang", "Jiangxi", 
        "Hubei", "Guangxi", "Gansu", "Shanxi", "Inner Mongolia", "Shaanxi", "Jilin", "Fujian", 
        "Guizhou", "Guangdong", "Qinghai", "Tibet", "Ningxia", "Hainan", "Sichuan"
    ],
    "+49": [ // Germany
        "Baden-Württemberg", "Bavaria", "Berlin", "Brandenburg", "Bremen", "Hamburg", "Hesse", 
        "Lower Saxony", "Mecklenburg-Vorpommern", "North Rhine-Westphalia", "Rhineland-Palatinate", 
        "Saarland", "Saxony", "Saxony-Anhalt", "Schleswig-Holstein", "Thuringia"
    ],
    "+33": [ // France
        "Île-de-France", "Provence-Alpes-Côte d'Azur", "Auvergne-Rhône-Alpes", "Nouvelle-Aquitaine", 
        "Occitanie", "Hauts-de-France", "Grand Est", "Brittany", "Normandy", "Bourgogne-Franche-Comté", 
        "Centre-Val de Loire", "Corsica", "Pays de la Loire"
    ],
    "+39": [ // Italy
        "Abruzzo", "Aosta Valley", "Apulia", "Basilicata", "Calabria", "Campania", "Emilia-Romagna", 
        "Friuli Venezia Giulia", "Lazio", "Liguria", "Lombardy", "Marche", "Molise", "Piedmont", 
        "Sardinia", "Sicily", "Trentino-South Tyrol", "Tuscany", "Umbria", "Veneto"
    ],
    "+7": [ // Russia
        "Moscow", "Saint Petersburg", "Novosibirsk", "Yekaterinburg", "Nizhny Novgorod", 
        "Samara", "Omsk", "Kazan", "Rostov-on-Don", "Chelyabinsk", "Ufa", "Volgograd", 
        "Krasnoyarsk", "Perm", "Voronezh"
    ],
    "+55": [ // Brazil
        "Acre", "Alagoas", "Amapá", "Amazonas", "Bahia", "Ceará", "Distrito Federal", "Espírito Santo", 
        "Goiás", "Maranhão", "Mato Grosso", "Mato Grosso do Sul", "Minas Gerais", "Pará", "Paraíba", 
        "Paraná", "Pernambuco", "Piauí", "Rio de Janeiro", "Rio Grande do Norte", "Rio Grande do Sul", 
        "Rondônia", "Roraima", "Santa Catarina", "São Paulo", "Sergipe", "Tocantins"
    ],
    "+27": [ // South Africa
        "Eastern Cape", "Free State", "Gauteng", "KwaZulu-Natal", "Limpopo", "Mpumalanga", 
        "Northern Cape", "North West", "Western Cape"
    ],
    "+34": [ // Spain
        "Andalusia", "Aragon", "Asturias", "Balearic Islands", "Basque Country", "Canary Islands", 
        "Cantabria", "Castile and León", "Castile-La Mancha", "Catalonia", "Extremadura", "Galicia", 
        "La Rioja", "Madrid", "Murcia", "Navarre", "Valencia"
    ],
    "+82": [ // South Korea
        "Seoul", "Busan", "Incheon", "Daegu", "Daejeon", "Gwangju", "Ulsan", "Sejong", 
        "Gyeonggi", "Gangwon", "North Chungcheong", "South Chungcheong", "North Jeolla", 
        "South Jeolla", "North Gyeongsang", "South Gyeongsang", "Jeju"
    ],
    "+92": [ // Pakistan
       "Azad Jammu & Kashmir","Bagh", "Hattian Bala", "Kotli", "Mirpur", "Muzaffarabad", "Neelum", "Poonch", "Sudhnati",
        "Balochistan","Awaran", "Barkhan", "Chagai", "Dera Bugti", "Gwadar", "Harnai", "Jafarabad", "Jhal Magsi", "Kalat", "Kech", "Kharan", "Khuzdar", "Killa Abdullah", "Killa Saifullah", "Kohlu", "Lasbela", "Lehri", "Loralai", "Mastung", "Musakhel", "Nasirabad", "Nushki", "Panjgur", "Pishin", "Quetta", "Sherani", "Sibi", "Sohbatpur", "Washuk", "Zhob", "Ziarat",
        "Gilgit-Baltistan","Astore", "Diamer", "Ghanche", "Ghizer", "Gilgit", "Hunza", "Nagar", "Shigar", "Skardu",
        "Islamabad",
        "Khyber Pakhtunkhwa","Abbottabad", "Bajaur", "Bannu", "Battagram", "Buner", "Charsadda", "Dera Ismail Khan", "Hangu", "Haripur", "Karak", "Kohat", "Kohistan", "Kurram", "Lakki Marwat", "Lower Dir", "Malakand", "Mansehra", "Mardan", "Nowshera", "Orakzai", "Peshawar", "Shangla", "South Waziristan", "Swabi", "Swat", "Tank", "Tor Ghar", "Upper Dir", "Upper Kohistan",
        "Punjab","Attock", "Bahawalnagar", "Bahawalpur", "Bhakkar", "Chakwal", "Chiniot", "Dera Ghazi Khan", "Faisalabad", "Gujranwala", "Gujrat", "Hafizabad", "Jhang", "Jhelum", "Kasur", "Khanewal", "Khushab", "Lahore", "Layyah", "Lodhran", "Mandi Bahauddin", "Mianwali", "Multan", "Muzaffargarh", "Nankana Sahib", "Narowal", "Okara", "Pakpattan", "Rahim Yar Khan", "Rajanpur", "Rawalpindi", "Sahiwal", "Sargodha", "Sheikhupura", "Sialkot", "Toba Tek Singh", "Vehari",
        "Sindh","Badin", "Dadu", "Ghotki", "Hyderabad", "Jacobabad", "Jamshoro", "Kambar Shahdadkot", "Karachi", "Kashmore", "Khairpur", "Korangi", "Larkana", "Malir", "Matiari", "Mirpur Khas", "Naushahro Feroze", "Qambar", "Sanghar", "Shaheed Benazirabad", "Shikarpur", "Sujawal", "Sukkur", "Tando Allahyar", "Tando Muhammad Khan", "Tharparkar", "Thatta", "Umerkot"
   
    ],
    "+62": [ // Indonesia
        "Aceh", "Bali", "Banten", "Bengkulu", "Central Java", "Central Kalimantan", "Central Sulawesi", 
        "East Java", "East Kalimantan", "East Nusa Tenggara", "Gorontalo", "Jakarta", "Jambi", 
        "Lampung", "Maluku", "North Kalimantan", "North Maluku", "North Sulawesi", "North Sumatra", 
        "Papua", "Riau", "Riau Islands", "Southeast Sulawesi", "South Kalimantan", "South Sulawesi", 
        "South Sumatra", "West Java", "West Kalimantan", "West Nusa Tenggara", "West Papua", 
        "West Sulawesi", "West Sumatra", "Yogyakarta"
    ],
    "+63": [ // Philippines
        "Abra", "Agusan del Norte", "Agusan del Sur", "Aklan", "Albay", "Antique", "Apayao", 
        "Aurora", "Basilan", "Bataan", "Batanes", "Batangas", "Benguet", "Biliran", "Bohol", 
        "Bukidnon", "Bulacan", "Cagayan", "Camarines Norte", "Camarines Sur", "Camiguin", 
        "Capiz", "Catanduanes", "Cavite", "Cebu", "Compostela Valley", "Cotabato", "Davao del Norte", 
        "Davao del Sur", "Davao Occidental", "Davao Oriental", "Dinagat Islands", "Eastern Samar", 
        "Guimaras", "Ifugao", "Ilocos Norte", "Ilocos Sur", "Iloilo", "Isabela", "Kalinga", 
        "La Union", "Laguna", "Lanao del Norte", "Lanao del Sur", "Leyte", "Maguindanao", 
        "Marinduque", "Masbate", "Metro Manila", "Misamis Occidental", "Misamis Oriental", 
        "Mountain Province", "Negros Occidental", "Negros Oriental", "Northern Samar", 
        "Nueva Ecija", "Nueva Vizcaya", "Occidental Mindoro", "Oriental Mindoro", "Palawan", 
        "Pampanga", "Pangasinan", "Quezon", "Quirino", "Rizal", "Romblon", "Samar", "Sarangani", 
        "Siquijor", "Sorsogon", "South Cotabato", "Southern Leyte", "Sultan Kudarat", "Sulu", 
        "Surigao del Norte", "Surigao del Sur", "Tarlac", "Tawi-Tawi", "Zambales", "Zamboanga del Norte", 
        "Zamboanga del Sur", "Zamboanga Sibugay"
    ],
    "+52": [ // Mexico
        "Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Chiapas", "Chihuahua", 
        "Coahuila", "Colima", "Durango", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", 
        "Mexico City", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", 
        "Querétaro", "Quintana Roo", "San Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", 
        "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas"
    ],
    "+31": [ // Netherlands
        "Drenthe", "Flevoland", "Friesland", "Gelderland", "Groningen", "Limburg", "North Brabant", 
        "North Holland", "Overijssel", "South Holland", "Utrecht", "Zeeland"
    ],
    "+45": [ // Denmark
        "Capital Region", "Central Denmark", "North Denmark", "Region of Southern Denmark", "Zealand"
    ],
    "+46": [ // Sweden
        "Blekinge", "Dalarna", "Gävleborg", "Gotland", "Halland", "Jämtland", "Jönköping", "Kalmar", 
        "Kronoberg", "Norrbotten", "Örebro", "Östergötland", "Skåne", "Södermanland", "Stockholm", 
        "Uppsala", "Värmland", "Västerbotten", "Västernorrland", "Västmanland", "Västra Götaland"
    ],
    "+47": [ // Norway
        "Agder", "Innlandet", "Møre og Romsdal", "Nordland", "Oslo", "Rogaland", "Troms og Finnmark", 
        "Trøndelag", "Vestfold og Telemark", "Vestland", "Viken"
    ],
    "+48": [ // Poland
        "Greater Poland", "Kuyavian-Pomeranian", "Lesser Poland", "Łódź", "Lower Silesian", 
        "Lublin", "Lubusz", "Masovian", "Opole", "Podlaskie", "Pomeranian", "Silesian", 
        "Subcarpathian", "Swietokrzyskie", "Warmian-Masurian", "West Pomeranian"
    ],
    "+32": [ // Belgium
        "Antwerp", "Brussels-Capital", "East Flanders", "Flemish Brabant", "Hainaut", "Liège", 
        "Limburg", "Luxembourg", "Namur", "Walloon Brabant", "West Flanders"
    ],
    "+41": [ // Switzerland
        "Aargau", "Appenzell Ausserrhoden", "Appenzell Innerrhoden", "Basel-City", "Basel-Country", 
        "Bern", "Fribourg", "Geneva", "Glarus", "Graubünden", "Jura", "Lucerne", "Neuchâtel", 
        "Nidwalden", "Obwalden", "Schaffhausen", "Schwyz", "Solothurn", "St. Gallen", "Thurgau", 
        "Ticino", "Uri", "Valais", "Vaud", "Zug", "Zürich"
    ],
    "+351": [ // Portugal
        "Aveiro", "Azores", "Beja", "Braga", "Bragança", "Castelo Branco", "Coimbra", 
        "Évora", "Faro", "Guarda", "Leiria", "Lisbon", "Madeira", "Portalegre", "Porto", 
        "Santarém", "Setúbal", "Viana do Castelo", "Vila Real", "Viseu"
    ],
    "+64": [ // New Zealand
        "Auckland", "Bay of Plenty", "Canterbury", "Gisborne", "Hawke's Bay", "Manawatu-Wanganui", 
        "Marlborough", "Nelson", "Northland", "Otago", "Southland", "Taranaki", "Tasman", 
        "Waikato", "Wellington", "West Coast"
    ],
    "+965": [ // Kuwait
        "Al Asimah", "Hawalli", "Farwaniya", "Mubarak Al-Kabeer", "Ahmadi", "Jahra"
    ],
    "+971": [ // UAE
        "Abu Dhabi", "Dubai", "Sharjah", "Ajman", "Fujairah", "Ras Al Khaimah", "Umm Al Quwain"
    ],
    "+966": [ // Saudi Arabia
        "Riyadh", "Mecca", "Medina", "Eastern Province", "Al-Qassim", "Ha'il", "Tabuk", 
        "Northern Borders", "Jazan", "Najran", "Al Bahah", "Al Jawf"
    ],
    "+90": [ // Turkey
        "Adana", "Adıyaman", "Afyonkarahisar", "Ağrı", "Aksaray", "Amasya", "Ankara", "Antalya", 
        "Ardahan", "Artvin", "Aydın", "Balıkesir", "Bartın", "Batman", "Bayburt", "Bilecik", 
        "Bingöl", "Bitlis", "Bolu", "Burdur", "Bursa", "Çanakkale", "Çankırı", "Çorum", 
        "Denizli", "Diyarbakır", "Düzce", "Edirne", "Elazığ", "Erzincan", "Erzurum", "Eskişehir", 
        "Gaziantep", "Giresun", "Gümüşhane", "Hakkâri", "Hatay", "Iğdır", "Isparta", "Istanbul", 
        "İzmir", "Kahramanmaraş", "Karabük", "Karaman", "Kars", "Kastamonu", "Kayseri", 
        "Kilis", "Kırıkkale", "Kırklareli", "Kırşehir", "Kocaeli", "Konya", "Kütahya", 
        "Malatya", "Manisa", "Mardin", "Mersin", "Muğla", "Muş", "Nevşehir", "Niğde", 
        "Ordu", "Osmaniye", "Rize", "Sakarya", "Samsun", "Siirt", "Sinop", "Sivas", 
        "Şanlıurfa", "Şırnak", "Tekirdağ", "Tokat", "Trabzon", "Tunceli", "Uşak", 
        "Van", "Yalova", "Yozgat", "Zonguldak"
    ],
    "+20": [ // Egypt
        "Alexandria", "Aswan", "Asyut", "Beheira", "Beni Suef", "Cairo", "Dakahlia", 
        "Damietta", "Faiyum", "Gharbia", "Giza", "Ismailia", "Kafr El Sheikh", 
        "Luxor", "Matrouh", "Minya", "Monufia", "New Valley", "North Sinai", "Port Said", 
        "Qalyubia", "Qena", "Red Sea", "Sharqia", "Sohag", "South Sinai", "Suez"
    ]
};

const countryCodeSelect = document.getElementById('countryCode');
const stateSelect = document.getElementById('state');
const filterByIButton = document.getElementById('filterByI');

// Listen for changes in the country code dropdown
countryCodeSelect.addEventListener('change', function() {
    const selectedCountryCode = countryCodeSelect.value;

    // Clear the current options in the state dropdown
    stateSelect.innerHTML = '<option value="">Select State</option>';

    // Get the states for the selected country code
    const states = countryStates[selectedCountryCode];

    if (states) {
        // Populate the state dropdown with new options
        states.forEach(state => {
            const option = document.createElement('option');
            option.value = state;
            option.textContent = state;
            stateSelect.appendChild(option);
        });
    }
});

// Function to filter states by letter "I"
filterByIButton.addEventListener('click', function() {
    const selectedCountryCode = countryCodeSelect.value;
    
    // Clear the state dropdown
    stateSelect.innerHTML = '<option value="">Select State</option>';

    // Get the states for the selected country
    const states = countryStates[selectedCountryCode];

    if (states) {
        // Filter states starting with "I"
        const filteredStates = states.filter(state => state.toLowerCase().startsWith('i'));

        // Populate the dropdown with filtered states
        filteredStates.forEach(state => {
            const option = document.createElement('option');
            option.value = state;
            option.textContent = state;
            stateSelect.appendChild(option);
        });
    }
});

