<header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 shadow-sm h-20 flex items-center">
    <nav class="container mx-auto px-6 relative">
        
        <div class="flex items-center justify-between">

            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="block hover:opacity-90 transition-opacity">
                    {{-- 
                        AJUSTES FEITOS:
                        - h-16 w-16: Aumentado (antes era h-12 w-12).
                        - rounded-2xl: Bordas suaves em vez de redondas (antes era rounded-full).
                        - shadow-md: Sombra um pouco mais forte para destaque.
                    --}}
                    <img class="h-16 w-32 rounded-2xl object-cover shadow-md border border-slate-200" src="{{ asset('storage/ci_logo.png') }}" alt="CI Logo">
                </a>
            </div>

            <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <ul class="flex items-center space-x-10 text-lg font-medium text-slate-700">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-blue-600 transition-colors relative group">
                            Home
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
                        </a>
                    </li>

                    <li class="relative group dropdown-group py-4"> <button class="flex items-center hover:text-blue-600 transition-colors">
                            Labs
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transition-transform duration-300 group-hover:rotate-180 opacity-70" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        
                        <div class="absolute hidden dropdown-menu bg-white shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] rounded-xl mt-2 w-60 py-2 z-20 border border-slate-100 left-1/2 transform -translate-x-1/2 text-base font-normal">
                            <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-4 h-4 bg-white border-t border-l border-slate-100 transform rotate-45 z-10"></div>
                            <div class="relative z-20 bg-white rounded-xl overflow-hidden">
                                <a href="{{ route('labs.engenharia-social') }}" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition-colors">Engenharia Social</a>
                                <a href="{{ route('labs.phishing') }}" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition-colors">Phishing</a>
                                <a href="{{ route('labs.malware') }}" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition-colors">Malware</a>
                                <a href="{{ route('labs.ransomware') }}" class="block px-6 py-3 hover:bg-blue-50 hover:text-blue-600 transition-colors">Ransomware</a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="{{ route('sobre-nos') }}" class="hover:text-blue-600 transition-colors whitespace-nowrap relative group">
                            Sobre Nós
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
                        </a>
                    </li>
                </ul>
            </div>


            <div>
                <div class="relative group dropdown-group py-2">
                    @guest
                        <a href="{{ route('login') }}" class="flex items-center bg-slate-900 text-white px-6 py-2.5 rounded-full hover:bg-slate-800 transition-all shadow hover:shadow-lg font-medium text-sm tracking-wide">
                            Acessar 
                        </a>
                    @endguest

                    @auth
                        <button class="flex items-center pl-1 pr-4 py-1 bg-slate-50 hover:bg-slate-100 rounded-full transition-all border border-slate-200 group-hover:border-blue-200">
                             {{-- Avatar Circular --}}
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white shadow-sm mr-3">
                                <span class="text-sm font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="font-semibold text-slate-700">{{ Auth::user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 text-slate-400 transition-transform group-hover:rotate-180" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <div class="absolute right-0 hidden dropdown-menu bg-white shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] rounded-xl mt-3 w-64 py-2 z-20 border border-slate-100 text-slate-700 font-medium">
                            <div class="absolute -top-2 right-6 w-4 h-4 bg-white border-t border-l border-slate-100 transform rotate-45 z-10"></div>
                            
                            <div class="relative z-20 bg-white rounded-xl overflow-hidden">
                                <div class="px-6 py-3 border-b border-slate-100 bg-slate-50/50">
                                    <p class="text-xs uppercase tracking-wider text-slate-400 font-bold mb-1">Conectado como</p>
                                    <p class="text-sm font-bold text-slate-900 truncate">{{ Auth::user()->email }}</p>
                                </div>

                                <div class="py-1">
                                    <a href="{{ route('profile.edit') }}" class="block px-6 py-2.5 hover:bg-blue-50 hover:text-blue-600 transition-colors">Meu Perfil</a>
                                    <a href="{{ route('dashboard') }}" class="block px-6 py-2.5 hover:bg-blue-50 hover:text-blue-600 transition-colors">Dashboard</a>
                                </div>

                                <form method="POST" action="{{ route('logout') }}" class="border-t border-slate-100 mt-1">
                                    @csrf
                                    <a href="{{ route('logout') }}" 
                                       class="block px-6 py-3 text-red-600 hover:bg-red-50 transition-colors flex items-center"
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                        Encerrar Sessão
                                    </a>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropdownGroups = document.querySelectorAll('.dropdown-group');
            let dropdownTimeouts = new Map();

            dropdownGroups.forEach(group => {
                const menu = group.querySelector('.dropdown-menu');
                if (!menu) return;

                const showMenu = () => {
                    if (dropdownTimeouts.has(group)) {
                        clearTimeout(dropdownTimeouts.get(group));
                        dropdownTimeouts.delete(group);
                    }
                    menu.classList.remove('hidden');
                    menu.classList.add('block', 'animate-fade-in'); 
                };

                const hideMenu = () => {
                    const timeoutId = setTimeout(() => {
                        menu.classList.remove('block', 'animate-fade-in');
                        menu.classList.add('hidden');
                    }, 200); 
                    dropdownTimeouts.set(group, timeoutId);
                };

                group.addEventListener('mouseenter', showMenu);
                group.addEventListener('mouseleave', hideMenu);
            });
        });
    </script>
</header>